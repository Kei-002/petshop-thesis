@extends('layouts.base')

@section('body')

    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <section style="padding-top:60px;">
        @csrf
        <div class="container">
            <h2 style="margin-top: 2%;">Grooming Service Lists</h2><br/>
            <div style="margin-bottom: 10px;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customerModal">
                Create new Grooming Service
              </button></div>

              {{-- Import Button - START --}}
             <div>
                <div class="input-group mb-3">
                    <form method="post" enctype="multipart/form-data" action="{{ url('/groomservices/import') }}">
                        @csrf
                        <input type="file" class="form-control" id="uploadName" name="service_upload" required>
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
                        <p class="modal-title w-100 font-weight-bold">Add New Grooming Service</p>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form method="POST" action="{{url('groomservices')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                        
                        <div class="modal-body mx-3" id="inputCustomerModal">
                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="name" style="display: inline-block;
                                width: 200px; ">Grooming Service Name</label>
                                <input type="text" id="groom_name" class="form-control validate" name="groom_name">
                            </div>

                             <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="genre" style="display: inline-block;
                                width: 150px; ">Price</label>
                                <input type="text" id="price" class="form-control validate" name="price">
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="genre" style="display: inline-block;
                                width: 150px; ">Description</label>
                                <input type="text" id="description" class="form-control validate" name="description">
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="genre" style="display: inline-block;
                                width: 150px; ">Image</label>
                                <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
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

