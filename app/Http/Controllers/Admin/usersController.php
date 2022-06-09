<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\usersDataTable;
use Illuminate\Http\Request;

use App\User;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(usersDataTable $user)
    {
        //
        return $user->render('admin.usersData.index', ['title' => trans('admin.users')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usersData.create', ['title' => trans('admin.createUser')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name'      => 'required', 
            'email'     => 'required|email|unique:users', 
            'password'  => 'required|min:6',
            //validate level input do take this values(user, company, level) only
            'level'     => 'required|in:user, company, vendor, عضو, شركة, متجر'],
            [], [
            'name'      => trans('admin.name'),
            'email'     => trans('admin.email'),
            'password'  => trans('admin.password'),
            'level'     => trans('admin.level'),
            ]);
        $data['password'] = bcrypt(request('password'));
        User::create($data);
        session()->flash('success', trans('admin.recordAdded'));
        return redirect(adminUrl('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usersData = User::find($id);
        $title     = trans('admin.editUser');
        return view('admin.usersData.edit', compact('usersData', 'title'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $this->validate($request, [
            'name'      => 'required', 
            'level'     => 'required|in:user, company, vendor, عضو, شركة, متجر',
            'email'     => 'required|email|unique:users, email,'.$id, 
            'password'  => 'sometimes|nullable|min:6'],
            //validate level input to take this values(user, company, level) only 
            
            [], [
            'name'      => trans('admin.name'),
            'email'     => trans('admin.email'),
            'password'  => trans('admin.password'),
            'level'     => trans('admin.level'),
            ]);

        // if(request()->has('password')){
        //     $data['password'] = bcrypt(request('password'));
        // }
        // User::where('id', $id)->update($data);
        // session()->flash('success', trans('admin.updatedRecord'));
        // return redirect(adminUrl('users'));

        print($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::find($id)->delete();
        session()->flash('success', trans('admin.deletedRecord'));
        return redirect(adminUrl('admin'));
    }

    public function multiDelete(){
        if(is_array(request('item'))){
            User::destroy(request('item'));
        }

        else{
            User::find(request('item'))->delete();
        }

        session()->flash('success', trans('admin.deletedRecord'));
        return redirect(adminUrl('admin'));
    }
}
