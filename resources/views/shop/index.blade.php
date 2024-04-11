@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4" style="background-color: #359ed0">
        <div class="container py-5">
            <h1 class="display-5 text-light fw-bold">
                Welcome to Ecit Store
            </h1>
        </div>
    </div>

    <div class="container">
        <div class="d-flex gap-3">
            @foreach ($items as $item)
            <div class="card w-25" style="width: 18rem;">
                <img class="card-img-top" src="src="{{ asset('app/' . $item->image) }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$item->name}}</h5>
                  <p class="card-text">{{$item->description}}</p>
                  <p class="card-text"> <strong>Tag</strong>:  
                    @foreach ($item->tags as $tag)
                    <span class="badge" style="background-color: #359ed0"> {{$tag->name}}</span> 
                    @endforeach</p>
                  <a href="{{route('show', $item->id)}}" class="btn text-light" style="background-color: #359ed0">Details</a>
                </div>
              </div>
            @endforeach
        </div>
    </div>

@endsection
