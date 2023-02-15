@extends('layouts.base')
@section('body')
<div class="container">
    <h2 style="margin-top: 5%;">Edit Customer Information</h2><br/>
    <!-- {{-- dd($artists) --}} -->
    {{ Form::model($customer,['route' => ['customer.update',$customer->id],'method'=>'PUT','files' => true]) }}
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="Name">Customer Name:</label>
            {!! Form::text('customer_name',$customer->customer_name,array('class' => 'form-control')) !!}
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="Address">Address</label>
            {!! Form::text('addressline',$customer->addressline,array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="Phone">Phone:</label>
            {!! Form::text('phone',$customer->phone,array('class' => 'form-control')) !!}
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
            <img src="{{ $customer->img_path }}" width="200px" style="margin-left: 42%;margin-top:10px;border:2px solid #555;">
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