@extends('layouts.app')

@section('content')

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<style>
    /* * {
    margin: 0;
    padding: 0;
}

body {
    background-color: #d6e1eb;
    margin-top: 10%;
}

.card {
    width: 350px;
    background-color: #efefef;
    border: none;
    cursor: pointer;
    transition: all 0.5s
}

.btnnn {
    height: 130px;
    width: 130px;
}

.image img {
    transition: all 0.5s
}

.card:hover .image img {
    transform: scale(1.3)
}

.name {
    font-size: 22px;
    font-weight: bold
}

.number {
    font-size: 15 px;
    font-weight: bold
}

.text span {
    font-size: 13px;
    color: #545454;
    font-weight: 500
}

.join {
    font-size: 14px;
    color: #a0a0a0;
    font-weight: bold
}

.date {
    background-color: #ccc
} */

body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            {{-- <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                <div class="card p-4">
                        <div class=" image d-flex flex-column justify-content-center align-items-center"> <button class="btnnn btn-secondary"> <img src="{{ $customer->img_path }}" height="100" width="100" /></button>
                        <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span class="number">Account : {{ $customer->customer_name }}</span></div>
                        <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span class="number">Phone : {{ $customer->phone }}</span></div>
                        <div class="d-flex flex-row justify-content-center align-items-center mt-3"> <span class="number">Email : {{ Auth::user()->email }}</span></div>
                        <div class=" px-2 rounded mt-4 date "> <span class="join">Joined {{ Auth::user()->created_at }}</span> </div>
                        <br>
                        <a href="{{ route('editProfile', $customer->id) }}" class="btn btn-info float-right" style="margin-top: 10px;">Edit</a>
                        <a href="{{ route('welcome') }}" class="btn btn-dark float-right" style="margin-top: 10px;">Back</a>
                    </div>
                </div>
            </div> --}}

            <div class="container emp-profile">
                {{-- <form method="post" action="{{ route('editProfile', $customer->id) }}"> --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-img">
                                <img src="{{ $customer->img_path }}" alt=""/>
                                {{-- <div class="file btn btn-lg btn-primary">
                                    Change Photo
                                    <input type="file" name="file"/>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 6%;">
                            <div class="profile-head">
                                        <h3>
                                            {{$customer->customer_name}}
                                        </h3>
                                        <br>
                                        <br>
                                       
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pet-tab" data-toggle="tab" href="#petTab" role="tab" aria-controls="petTab" aria-selected="false">Pets</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2" style="margin-top: 6%;">
                            {{-- <a href="{{ route('editProfile', $customer->id) }}" class="profile-edit-btn" name="btnAddMore"></a> --}}
                            <div>
                                 <a href="{{ route('editProfile', $customer->id) }}" class="btn btn-outline-secondary float-right rounded-pill" style="margin-top: 10px;">Edit Profile</a>

                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-danger float-right rounded-pill mt-1" data-bs-toggle="modal" data-bs-target="#petModal">
                                    Add pet
                                  </button>
                            </div>
                            
                            {{-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/> --}}
                        </div>
                    </div>
                        <div>
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Name: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{$customer->customer_name}}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Email: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{$customer->user->email}}</p>
                                                </div>
                                            </div>
                                            
                                    
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Phone: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{$customer->phone}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Address: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{$customer->addressline}}</p>
                                                </div>
                                            </div>
                                </div>
                                <div class="tab-pane fade" id="petTab" role="tabpanel" aria-labelledby="pet-tab">
                                    
                                            {{-- <div class="row">
                                                <div class="col-md-6">
                                                    <label>Experience</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Expert</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Hourly Rate</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>10$/hr</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Total Projects</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>230</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>English Level</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Expert</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Availability</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>6 months</p>
                                                </div>
                                            </div>
                                    --}}

                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Pet Name</th>
                                            <th scope="col">Age</th>
                                            <th scope="col" class="col-sm-1">Edit</th>
                                            <th scope="col" class="col-sm-1">Delete</th>
                                          </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($customer->pets as $pet)                                             
                                                    <tr>
                                                        <th scope="row">{{$pet->id}}</th>
                                                        <td>{{$pet->pet_name}}</td>
                                                        <td>{{$pet->age}}</td>
                                                        <td>
                                                            <a href="{{ route('pet.edit', $pet->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                        </td>
                                                        <td>
                                                            <form method="post" action="{{ route('pet.destroy', $pet->id) }}">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE" />
                                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                
                                            @empty
                                                <p class="bg-danger text-white p-1">No registered pets</p>
                                            @endforelse
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </form>            --}}
            </div>


 {{-- MODAL START --}}
{{-- <div class="container"> --}}

    <div class="modal fade" id="petModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width:75%;">
            <div class="modal-content">
                <div class="modal-header text-center">
                    {{-- Modal Header --}}
                        <p class="modal-title w-100 font-weight-bold">Add New Pet</p>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form  method="POST" action="{{url('pet')}}" enctype="multipart/form-data" id="pet_modal">
                            {{csrf_field()}}
                        
                        <div class="modal-body mx-3" id="inputPetModal">
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

                            {{-- <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="genre" style="display: inline-block;
                                width: 150px; ">Customer Owner</label>
                                    <select name="owner" id="owner" class="form-control">
                                        <option value="">== Select Pet Owner ==</option>
                                        @foreach ($customer as $owner => $customer_name)
                                            <option value="{{ $owner }}">{{ $customer_name }}</option>
                                        @endforeach
                                    </select>
                            </div> --}}

                            {{ Form::hidden('owner', $customer->id) }}

                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="genre" style="display: inline-block;
                                width: 150px; ">Image</label>
                                <input class="form-control" name="img_path" type="file" id="img_path">
                            </div>

                            {{-- Modal Buttons --}}
                            <div class="modal-footer d-flex justify-content-center">
                                <button onclick="form_submit()" type="submit" class="btn btn-success">Save</button>
                                <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
            </div>
        </div>
        
    </div>

{{-- </div> --}}
    
  {{-- MODAL END --}}            


  <script type="text/javascript">
    function form_submit() {
      document.getElementById("pet_modal").submit();
     }    
    </script>

                    
@endsection
