@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 5%">
    <div class="card">
        <div class="card-body">
<form action="{{ route('search') }}" method="POST">
    @csrf
    <input type="text" name="query" />
    <input type="submit" class="btn btn-sm btn-primary" value="Search" />
</form>

<table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Pet Name</th>
        <th scope="col">Disease Name</th>
        <th scope="col">Comment/Observation</th>
        <th scope="col">Consultation Date</th>
      </tr>
    </thead>
    <tbody>
        @foreach($consultation as $consult)
            <td>{{$consult->id}}</td>
            @foreach($consult->pets as $pet)
                <td>{{$pet->pet_name}}</td>
            @endforeach
            
            <td>{{$consult->disease->disease_name}}</td>
            <td>{{$consult->comments}}</td>
            <td>{{$consult->created_at}} </td>  
            </tr>
        @endforeach
    </tbody>
  </table>
        </div>
    </div>
</div>

@endsection