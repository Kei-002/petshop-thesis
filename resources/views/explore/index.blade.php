
@extends('layouts.app')
@section('content')

{{-- @if(Session::has('cart'))
    {{ dd(session()->all())}}
@endif --}}

<div class="container">
    <div class="row">
    <h3 class="text-2xl font-medium text-gray-700" style="margin-top: 8%;">Explore Services</h3>
    @foreach ($grooming as $groomings)
    <div class="card" style="width: 18rem;margin-left:15px;">
        
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner">
                @foreach($groomings->images as $key => $slider)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                    <img src="/storage/images/{{ $slider->image}}" class="d-block w-100"  alt="..." style="width: 500px;height: 250px;"> 
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    
        <div class="card-body">
            <form method="GET" action="{{ route('item.addToCart', ['id'=>$groomings->id]) }}" enctype="multipart/form-data">
                {{csrf_field()}}
                <h5 class="card-title">{{ $groomings->groom_name }}</h5>
                <p class="card-text">{{ $groomings->description }}. ${{ $groomings->price }}</p>
                  <select class="form-select" aria-label="Default select example" name="pet_id" required id="pet_id">
                      <option value="option_select" disabled selected>Select Pet</option>
                      @foreach($pet->pets as $petsu)
                          <option value="{{ $petsu->id }}">{{ $petsu->pet_name}}</option>
                      @endforeach
                  </select>
                <a href="{{ route('moreinfo', $groomings->id) }}" class="btn btn-default eyy" data-toggle="tooltip" title="More Info!" role="button" style="float: right">
                <i class="fas fa-info"></i></a>
                <div>
      
                  {{-- <a href="{{ route('item.addToCart', ['id'=>$groomings->id]) }}" class="card-link">Add to cart</a> --}}
                  <button type="submit" class="btn btn-primary" style="margin-top: 8px;">
                      Inquire
                  </button>
                </div>

            </form>
        </div> 
            
         
        
    </div>
    @endforeach
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
