@extends('layouts.base')
@section('body')

<div class="container">
    <h2 style="margin-top: 5%;">Edit Grooming Service Information</h2>
    <!-- {{-- dd($artists) --}} -->    
    <div class="row">

        <div class="col-md-2">
            @if (count($groomservices->images)>0)
                            <p>Grooming Service Images:</p>
                            @foreach ($groomservices->images as $img)
                            
                                <div class="card text-white bg-secondary mb-3" style="width: 7rem;">
                                    <img src="/storage/images/{{ $img->image }}" class="card-img-top" style="max-height: 120px; max-width: 8rem;">
                                    <div class="card-body">
                                        <a href="{{ route('deleteimage',$img->id) }}" class="btn btn-danger mt-2">Delete</a>
                                    </div>
                                </div>
                        
                            @endforeach
            @endif
        </div>
            

        <div class="col-md-8">
            {{ Form::model($groomservices,['route' => ['groomservices.update',$groomservices->id],'method'=>'PUT','files' => true]) }}
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-5">
                    <label for="Name">Grooming Service:</label>
                    {!! Form::text('groom_name',$groomservices->groom_name,array('class' => 'form-control')) !!}
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-5">
                    <label for="Address">Price</label>
                    {!! Form::text('price',$groomservices->price,array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-5">
                    <label for="Phone">Description:</label>
                    {!! Form::text('description',$groomservices->description,array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-5">
                    <label>Images:</label>
                    <input type="file" id="input-file-now-custom-3" class="form-control" name="images[]" multiple>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-5" style="margin-top:10px; margin-left:10px;">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
        
    </div>

    
@endsection