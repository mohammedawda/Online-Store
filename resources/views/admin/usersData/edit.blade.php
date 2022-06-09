@extends('admin.indexadminData')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          {!! Form::open(['route' => ['users.update', $usersData->id], 'method' => 'put']) !!}
            
            <div class="form-group">
                {!! Form::label('name', trans('admin.name')) !!}
                {!! Form::text('name', $usersData->name, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', trans('admin.email')) !!}
                {!! Form::email('email', $usersData->email, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', trans('admin.password')) !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('level', trans('admin.level')) !!}
                {!! Form::select('level', ['user' => trans('admin.user'), 'vendor' => trans('admin.vendor'), 'company' => trans('admin.company')], $usersData->level, ['class' => 'form-control', 'placeholder' => '.......']) !!}
            </div>

            {!! Form::submit(trans('admin.save'), ['class' => 'btn btn-primary']) !!}
          {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>            
    
@endsection