@extends('layouts.app')
@section('content')

<style>

.haay{
    font-size: 30px !important; 
    color: black
}

.huy{
    font-size: 12px !important; 
}

</style>

<div class="container">
    <div class="card" style="margin-top: 10%;">
   
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner">
                @foreach($grooming->images as $key => $slider)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                    <img src="/storage/images/{{ $slider->image}}" class="d-block w-100"  alt="..." style="width: 300px;height: 600px;"> 
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
            <h5 class="card-title"><strong>{{ $grooming->groom_name }}</strong></h5>
          <p class="card-text">{{ $grooming->description }}. ${{ $grooming->price }}</p>
        </div>
      <div><a href="{{ url('explore') }}" class="btn btn-danger float-end" style="margin-left:10px;">BACK</a></div>
      <br>
    </div>

    <div>
        <form action="{{ route('newcomment',$grooming->id)}}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" value="{{ $grooming->id }}" name="groom_id">

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Comment Here !</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>
                                <div class="form-group mb-3">
                                    @if(Auth::user())
                                        <label for="">Name:</label>
                                        <input type="text" name="guest_name" class="form-control" value="{{Auth::user()->name}}" readonly>

                                    @else
                                        <label for="">Name:</label>
                                        <input type="text" name="guest_name" class="form-control">
                                    @endif
                                    
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <div class="form-group">
                                    <label for="comment">Comment</label>
                                    <textarea class="form-control" name="comment" id="comment" rows="4" placeholder="Comment Here"></textarea>
                                </div>
                                <div>
                                    <button type="submit" name="submit" id="submit" class="btn btn-success" value="submit">Submit</button>
                                </div>
                            </th>
                        </tr>                
                    </tbody>
                </table>
            </div>
        </form>
        @forelse ($comment as $cmmts)
        <div class="card-body"> 
            <table class="table table-bordered table-striped ">
                <tbody>
                    <tr>
                        <th>
                            <div>
                                <h1 class="card-title haay">{{ $cmmts->guestname }}</h1>
                                <h1 class="huy">{{ $cmmts->created_at }}</h1>
                                <p class="card-text">{{ $cmmts->comments }}</p>
                            </div>
                        </th>
                    </tr>           
                </tbody>
            </table>
        </div>    
        @empty
        <table class="table table-bordered table-striped">
        <thead>No Comment!</thead>
        </table>
        @endforelse
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection