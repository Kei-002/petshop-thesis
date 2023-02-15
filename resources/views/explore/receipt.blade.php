@extends('layouts.app')
@section('content')


<style media="print">
@page {
    size: auto; 
    margin: 0; 
    
}

#gg{
    display: none;
}

#app {
    display: none;
}

</style>

    <div class="container" style="margin-top: 8%;">
        <div class="card">
        <div class="row">
                <div class="col-12">

                        <div class="invoice p-3 mb-3">

                          <div class="row">
                            <div class="col-12">
                              <h4>
                                <img class="lugu" src="{{ asset('images/logo.png') }}" alt="sst logo" style="width:50px;border-radius: 50%;border: 2px solid #555"> SangSangTek
                                <small class="float-right">Date: {{$order->created_at}}</small>
                              </h4>
                            </div>

                          </div>

                          <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                              From
                              <address>
                                <strong>SangSangTek</strong><br>
                                123 Taguig City<br>
                                Philippines<br>
                                Phone: (123) 123-5432<br>
                                Email: sst.admin@admin.com
                              </address>
                            </div>

                            <div class="col-sm-4 invoice-col">
                              To
                              <address> 
                                <strong>{{$order->customer->customer_name}}</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone:{{ $order->customer->phone}}<br>
                                {{-- Email:{{ $order->customer->email}} --}}
                              </address>
                            </div>

                            <div class="col-sm-4 invoice-col">
                              <b>Invoice #2022-{{$order->id}}</b><br>
                              <br>
                              <b>Order ID:</b> {{$order->id}}<br>
                              {{-- <b>Payment Due:</b> 2/22/2014<br> --}}
                              {{-- <b>Account:</b> 968-34567 --}}
                            </div>

                          </div>

                          <div class="row">
                            <div class="col-12 table-responsive">
                              <table class="table table-striped">
                                <thead>
                                <tr>
                                  <th>Qty</th>
                                  <th>Pet</th>
                                  <th>Product</th>
                                  <th>Description</th>
                                  <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @foreach($order->orderlines as $orderline)
                                  <tr>
                                    <td>{{$orderline->quantity}}</td>
                                    @foreach($orderline->pets as $pet)
                                      <td>{{$pet->pet_name}}</td>
                                    @endforeach
                                    @foreach($orderline->groomservices as $groom)
                                      <td>{{$groom->groom_name}}</td>
                                      <td>{{$groom->description}}</td>
                                      <td>${{number_format((float)($groom->price * $orderline->quantity), 2, '.', '') }}</td>
                                    @endforeach
                                    
                                  </tr>

                                  @endforeach
                               
                                </tbody>
                              </table>
                            </div>

                          </div>


                              <div class="table-responsive">
                                <table class="table">
                                  <tbody><tr>
                                    <th style="width:90%">Total:</th>
                                    <td>${{number_format((float)($totalPurchase), 2, '.', '') }}</td>
                                  </tr>
                                </tbody></table>
                              </div>
                            </div>

                          </div>



                          <div class="row no-print">
                            <div class="col-12">

                                <button type="submit" name="submit" id="gg" class="btn btn-success" value="submit" onclick="window.print()"><i class="fa fa-print"></i> Print</a></button>

                            </div>
                          </div>

                        </div>

                      </div>

        </div>
    </div>
</div>

@endsection