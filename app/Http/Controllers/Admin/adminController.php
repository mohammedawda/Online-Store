<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\adminDataTable;
use Illuminate\Http\Request;

use App\Admin;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(adminDataTable $admin)
    {
        //
        return $admin->render('admin.adminData.index', ['title' => trans('admin.adminPanel')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adminData.create', ['title' => trans('admin.createAdmin')]);
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
            'email'     => 'required|email|unique:admins', 
            'password'  => 'required|min:6'],
            [], [
            'name'      => trans('admin.name'),
            'email'     => trans('admin.email'),
            'password'  => trans('admin.password')
            ]);
        $data['password'] = bcrypt(request('password'));
        Admin::create($data);
        session()->flash('success', trans('admin.recordAdded'));
        return redirect(adminUrl('admin'));
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
        $adminData = Admin::find($id);
        $title     = trans('admin.editAdmin');
        return view('admin.adminData.edit', compact('adminData', 'title'));

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
            'email'     => 'required|email|unique:admins, email,'.$id, 
            'password'  => 'sometimes|nullable|min:6'],
            [], [
            'name'      => trans('admin.name'),
            'email'     => trans('admin.email'),
            'password'  => trans('admin.password')
            ]);

        if(request()->has('password')){
            $data['password'] = bcrypt(request('password'));
        }
        Admin::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updatedRecord'));
        return redirect(adminUrl('admin'));
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
        Admin::find($id)->delete();
        session()->flash('success', trans('admin.deletedRecord'));
        return redirect(adminUrl('admin'));
    }

    public function multiDelete(){
        if(is_array(request('item'))){
            Admin::destroy(request('item'));
        }

        else{
            Admin::find(request('item'))->delete();
        }

        session()->flash('success', trans('admin.deletedRecord'));
        return redirect(adminUrl('admin'));
    }
}
