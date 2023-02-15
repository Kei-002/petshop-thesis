@extends('layouts.base')


@section('body')

    <title>SST</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <section style="padding-top:60px;">
        @csrf
        <div class="container">
            <h2 style="margin-top: 2%;">Pet Lists</h2><br/>
            <div style="margin-bottom: 10px;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customerModal">
                Create New Pet
              </button>
            </div>

             {{-- Import Button - START --}}
             <div>
                <div class="input-group mb-3">
                    <form method="post" enctype="multipart/form-data" action="{{ url('/pet/import') }}">
                        @csrf
                        <input type="file" class="form-control" id="uploadName" name="pet_upload" required>
                        <button class="btn btn-outline-secondary" type="submit" id="uploadName">Upload</button>
                    </form>
                  </div>
            </div>
           
            {{-- Import Button - END --}}
            
            <div class="row">
                {{$dataTable->table()}}
                
            </div>
        </div>

        
    </section>
    


     {{-- MODAL START --}}
{{-- <div class="container"> --}}

    <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width:75%;">
            <div class="modal-content">
                <div class="modal-header text-center">
                    {{-- Modal Header --}}
                        <p class="modal-title w-100 font-weight-bold">Add New Pet</p>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form  method="POST" action="{{url('pet')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                        
                        <div class="modal-body mx-3" id="inputCustomerModal">
                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="name" style="display: inline-block;
                                width: 150px; ">Pet Name</label>
                                <input type="text" id="pet_name" class="form-control validate" name="pet_name">
                            </div>

                            {{-- <div class="md-form mb-5">
                                <label for="artist">artist:</label>
                                {!! Form::select('artist_id', App\Models\Artist::pluck('artist_name','id'), null,['class' => 'form-control']) !!}
                             </div> --}}


                             <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="genre" style="display: inline-block;
                                width: 150px; ">Pet Age</label>
                                <input type="text" id="age" class="form-control validate" name="age">
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="genre" style="display: inline-block;
                                width: 150px; ">Customer Owner</label>
                                    <select name="owner" id="owner" class="form-control">
                                        <option value="">== Select Pet Owner ==</option>
                                        @foreach ($custo as $owner => $customer_name)
                                            <option value="{{ $owner }}">{{ $customer_name }}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="genre" style="display: inline-block;
                                width: 150px; ">Image</label>
                                <input class="form-control" name="img_path" type="file" id="img_path">
                            </div>

                            {{-- Modal Buttons --}}
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-success">Save</button>
                                {{-- <button class="btn btn-light" data-dismiss="modal">Cancel</button> --}}
                            </div>
                        </form>
            </div>
        </div>
        
    </div>

{{-- </div> --}}
    
  {{-- MODAL END --}}



@push('scripts')
    {{$dataTable->scripts()}}
@endpush

@endsection

