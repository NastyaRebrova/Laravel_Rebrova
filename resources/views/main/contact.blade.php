@extends('layout')
@section('content')
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$contact['name']}}</h5>
            <p class="card-text">{{$contact['adres']}}</p>
            <p class="card-text">{{$contact['phone']}}</p>
            <a href="#" class="card-link">{{$contact['email']}}</a>
        </div>
    </div>
@endsection