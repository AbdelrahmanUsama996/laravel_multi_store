@extends('layouts.publicWebsiteLayout')
@section('content')
    <div class="laptop1">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="laptop1_img">
                        <figure><img src="{{ $product->image }}" alt="#" /></figure>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="titlepage">
                        <h2>{{ $product->name }}</h2>
                        <p>{{ $product->description }}</p>
                        <p>{{ $product->price }}$</p>
                        {{-- <a class="read_more" href="{{ URL('dashboard/transactions/create') }}">Purchase</a> --}}
                        <form action="{{ URL('product/transactions/store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="read_more">Purchase</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
