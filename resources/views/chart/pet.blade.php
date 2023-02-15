@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 5%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pet Chart</div>

                <div class="card-body">


                    <h1>{{ $chart1->options['chart_title'] }}</h1>
                    {!! $chart1->renderHtml() !!}


                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


{!! $chart1->renderJs() !!}


@endsection
