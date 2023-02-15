@extends('layouts.base')

@section('body')

    <title>Customer Test</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <section style="padding-top:60px;">
        @csrf
        <div class="container">
            <h2 style="margin-top: 2%;">Employee Lists</h2><br/>
            <div style="margin-bottom: 10px;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#employeeModal">
                Create new Employee
              </button></div>

              {{-- Import Button - START --}}
             <div>
                <div class="input-group mb-3">
                    <form method="post" enctype="multipart/form-data" action="{{ url('/employee/import') }}">
                        @csrf
                        <input type="file" class="form-control" id="uploadName" name="employee_upload" required>
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

    <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width:75%;">
            <div class="modal-content">
                <div class="modal-header text-center">
                    {{-- Modal Header --}}
                        <p class="modal-title w-100 font-weight-bold">Add New Customer</p>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form method="POST" action="{{url('employee')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                        
                        <div class="modal-body mx-3" id="inputEmployeeModal">
                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="name" style="display: inline-block;
                                width: 150px; ">Employee Name</label>
                                <input type="text" id="employee_name" class="form-control validate" name="employee_name">
                            </div>

                            {{-- <div class="md-form mb-5">
                                <label for="artist">artist:</label>
                                {!! Form::select('artist_id', App\Models\Artist::pluck('artist_name','id'), null,['class' => 'form-control']) !!}
                             </div> --}}


                             <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="genre" style="display: inline-block;
                                width: 150px; ">Address</label>
                                <input type="text" id="addressline" class="form-control validate" name="addressline">
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="genre" style="display: inline-block;
                                width: 150px; ">Phonenumber</label>
                                <input type="text" id="phone" class="form-control validate" name="phone">
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="genre" style="display: inline-block;
                                width: 150px; ">Email</label>
                                <input type="text" id="email" class="form-control validate" name="email">
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="genre" style="display: inline-block;
                                width: 150px; ">Password</label>
                                <input type="password" id="password" class="form-control validate" name="password">
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

