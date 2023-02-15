@extends('layouts.base')

@section('body')

{{-- {{ dd($orderline); }} --}}

    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <section style="padding-top:60px;">
        @csrf
        <div class="container">
            <h2 style="margin-top: 2%;">Transaction Lists</h2><br/>
   
            <div class="row">
                {{$dataTable->table()}}
            </div>

        </div>

    </section>


  
@push('scripts')
    {{$dataTable->scripts()}}
@endpush

@endsection

