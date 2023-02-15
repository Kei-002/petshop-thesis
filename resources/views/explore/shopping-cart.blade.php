@extends('layouts.app')
@section('content')

<div class="container" style="margin-top: 5%;">
    <form method="get" action="{{ route('checkout') }}" enctype="multipart/form-data">
        @csrf
        @if (Session::has('cart'))
                        <table class="table">
                            <h5 style="text-align:center;font-size:25px;font-weight: bold;">ACME Pet Clinic And Grooming Services</h5>
                            <br>
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Services</th>
                                <th scope="col">Pet</th>
                                <th scope="col">Price</th>
                                <th scope="col" id="gg">Remove</th>
                                <th scope="col" id="gg">ReduceByOne</th>
                              </tr>
                            </thead>
                        @foreach ($items as $item)
                            <tbody>
                              <tr>  
                                <th scope="row">{{ $item['qty'] }}</th>
                                <td>{{ $item['item']['groom_name'] }}</td>
                                <td>{{ $item['pet']['pet_name'] }}</td>
                                <td>${{ $item['price'] }}</td>
                                <td><a  id="gg" href="{{ route('item.remove', ['id' => $item['item']['id']]) }}" class="btn btn-danger btn-sm" role="button">Reduce
                                    All</a></td>
                                <td><a id="gg" href="{{ route('item.reduceByOne', ['id' => $item['item']['id']]) }}" class="btn btn-danger btn-sm" role="button">Reduce
                                    1</a></td>
                              </tr>
                        @endforeach
                            </tbody>
                        </table>
                        <hr>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                        <strong>Total: ${{ $totalPrice }}</strong>
                    </div>
                </div>
                <hr>
                
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                        <button type="submit" name="submit" id="gg" class="btn btn-success" value="submit">Checkout</button>
                    </div>
                </div>
                <br>
                <div class="clearfix"><a href="{{ url('explore') }}" class="btn btn-danger float-end" id="gg">BACK</a></div>
            @else
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                        <h2>No Items in Cart!</h2>
                    </div>
                </div>
            </div>
    </form>
</div>
    @endif
@endsection