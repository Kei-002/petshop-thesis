@extends('layouts.base')
@section('body')
<div class="container">
    <h2 style="margin-top: 5%;">Edit Pet Information</h2><br/>
    <!-- {{-- dd($artists) --}} -->
    {{ Form::model($pet,['route' => ['pet.update',$pet->id],'method'=>'PUT','files' => true]) }}
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="Name">Pet Name:</label>
            {!! Form::text('pet_name',$pet->pet_name,array('class' => 'form-control')) !!}
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="Age">Pet Age:</label>
            {!! Form::text('age',$pet->age,array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="Owner">Pet Owner:</label>
            {!! Form::select('customer_id',$custo,$pet->customer_id,['class' => 'form-control form-select']) !!}
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
            <img src="{{ $pet->img_path }}" width="200px" style="margin-left: 42%;margin-top:10px;border:2px solid #555;">
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