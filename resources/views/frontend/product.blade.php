@extends('layouts.frontend')

@section('title', 'Products')

@section('content')

    <div class="container products">

        <div class="row">
            @foreach ($products as $item)
            <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="{{ asset('images/'.$item['image']) }}" width="500" height="300" alt="">
                    <div class="caption">
                        <h4>{{ $item['generic_name'] }}</h4>
                        <p>{{ Str::limit(strtolower($item['description']),50) }}</p>
                        <p><strong>Price: </strong> {{ $item['price'] }}</p>
                        <p class="btn-holder"><a href="{{ url('add-to-cart/'.$item['id']) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                    </div>
                </div>
            </div>  
            @endforeach
        </div><!-- End row -->

    </div>

@endsection