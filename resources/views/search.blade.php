@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 5%">
<div class="card">
    <div class="card-header"><b>{{ $searchResults->count() }} results found for "{{ request('query') }}"</b></div>

    <div class="card-body">

        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Pet Name</th>
                <th scope="col">Disease Name</th>
                <th scope="col">Comments/Observation</th>
                <th scope="col">Consultation Date</th>
              </tr>
            </thead>
            <tbody>
                @foreach($searchResults as $searchResult)
              <tr>
                @foreach ($searchResult->searchable->consults as $consult)
                <td>{{ $searchResult->title }}</td>
                <td>{{$consult->disease->disease_name}}</td>
                <td>{{$consult->comments}}</td>
                <td>{{$consult->created_at}}</td>
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