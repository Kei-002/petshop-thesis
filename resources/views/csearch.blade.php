@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 5%">
<div class="card">
    <div class="card-header"><b>{{ $searchResults->count() }} results found for "{{ request('query') }}"</b></div>

    <div class="card-body">

        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Customer</th>
                <th scope="col">Services</th>
                <th scope="col">Status</th>
                <th scope="col">Transaction Date</th>
              </tr>
            </thead>
            <tbody>
                @foreach($searchResults as $searchResult)
              <tr>
                @foreach ($searchResult->searchable->orders as $order)
                    <td>{{ $searchResult->title }}</td>
                        <td>@foreach($order->orderlines as $grooming)
                            @foreach ($grooming->groomservices as $services)
                            <li style="margin-left: 10px;">{{$services->groom_name}}</li>
                            @endforeach  
                        @endforeach</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->created_at}}</td>
                </tr>
                @endforeach
              </tr>
              @endforeach
            </tbody>
          </table>
          
    </div>
</div>
</div>

@endsection