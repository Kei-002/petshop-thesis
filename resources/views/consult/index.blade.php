@extends('layouts.base')
@section('body')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>


<div class="container">
    <h2 style="margin-top: 5%;">Pet Consultation</h2><br/>
    <!-- {{-- dd($artists) --}} -->
    <form method="POST" action="{{route('consultStore')}}" enctype="multipart/form-data">
        {{csrf_field()}}
    
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="customer">Customer :</label>
            <select class="form-control" name="customer" id="customer">
                <option value="" selected disabled> Select </option>
                @forelse ($customer as $customers)
                    <option value="{{ $customers->id }}">{{ $customers->customer_name }} </option>
                @empty
                @endforelse
            </select>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="pet">Pet :</label>
            <select class="form-control" name="pet" id="pet">
                <option> Select </option>
            </select>
        </div>
    </div>

     {{-- <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="Phone">Veterinarian :</label>
                EMPLOYEE DROPDOWN 
                    {!! Form::select('customer_id',$custo,$pet->customer_id,['class' => 'form-control form-select']) !!}
                    
        </div>
    </div>  --}}

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="disease">Diseases :</label>
              {{-- DISEASE DROPDOWN  --}}
              <select name="disease" id="disease" class="form-control">
                <option value=""></option>
                @foreach ($diseases as $disease)
                    <option value="{{ $disease->id }}">{{ $disease->disease_name }}</option>
                @endforeach
            </select>
                     
        </div>
    </div>


    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="fee">Fee :</label>
            <input type="text" id="fee" class="form-control validate" name="fee">
        </div>
    </div>


    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="comment">Comment/Observation :</label>
              {{-- TEXTAREA FOR COMMENT AND OBSERVATION --}}
                    {!! Form::textarea('comment', null, ['id' => 'comment', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none', 'class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </div>
    </form>
    <!-- {{--{!! Form::close() !!} --}} -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/script.js') }}"></script>
    
@endsection