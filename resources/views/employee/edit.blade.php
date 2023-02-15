@extends('layouts.base')
@section('body')
<div class="container">
    <h2 style="margin-top: 5%;">Edit Employee Information</h2><br/>
    <!-- {{-- dd($artists) --}} -->
    {{ Form::model($employee,['route' => ['employee.update',$employee->id],'method'=>'PUT','files' => true]) }}
   
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="Name">Employee Name:</label>
            {!! Form::text('employee_name',$employee->employee_name,array('class' => 'form-control')) !!}
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="Address">Address</label>
            {!! Form::text('addressline',$employee->addressline,array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="Phone">Phone:</label>
            {!! Form::text('phone',$employee->phone,array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="role">Role:</label>
            @if(Auth::user()->is_admin)
            {!! Form::select('role', array('admin' => 'Admin','employee' => 'Employee', 'vet' => 'Veterenarian', 'groomer' => 'Groomer'), $employee->user->role, ['class' => 'form-control form-select']) !!}
            @else
            {!! Form::select('role', array('admin' => 'Admin','employee' => 'Employee', 'vet' => 'Veterenarian', 'groomer' => 'Groomer'), $employee->user->role, ['class' => 'form-control form-select', 'disabled' => 'disabled']) !!}
            @endif
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="Image">Image:</label>
            <input class="form-control" name="img_path" type="file" id="img_path" placeholder="Upload Image:">
            @error('img_path')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
           @enderror
        </div>
        <div class="form-group">
            <img src="{{ $employee->img_path }}" width="200px" style="margin-left: 42%;margin-top:10px;border:2px solid #555;">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </div>
     {!! Form::close() !!}
    </div>

    
@endsection