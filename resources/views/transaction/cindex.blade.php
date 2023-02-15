@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 5%">
    <div class="card">
        <div class="card-body">
<form action="{{ route('csearch') }}" method="POST">
    @csrf
    <input type="text" name="query" />
    <input type="submit" class="btn btn-sm btn-primary" value="Search" />
</form>

<table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Customer</th>
        <th scope="col">Services</th>
        <th scope="col">Status</th>
        <th scope="col">Transaction Date</th>
      </tr>
    </thead>
    <tbody>
        @foreach($order as $orders)
            <td>{{$orders->id}}</td>
            <td>{{$orders->customer->customer_name}}</td>
            <td>@foreach($orders->orderlines as $grooming)
                @foreach ($grooming->groomservices as $services)
                   <li style="margin-left: 10px;">{{$services->groom_name}}</li>
                @endforeach  
            @endforeach</td>
            <td>{{$orders->status}}</td>
            <td>{{$orders->created_at}} </td>  
            </tr>
        @endforeach
    </tbody>
  </table>
        </div>
    </div>
</div>

@endsection