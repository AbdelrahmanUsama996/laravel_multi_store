@extends('layouts.publicWebsiteLayout')
@section('content')
    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="our_products">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-4 d-flex  margin_bottom1">
                                    <div class="d-flex flex-column product_box">
                                        <figure><img src="{{ $product->image }}" width="80" height="50"
                                                alt="#" />
                                        </figure>
                                        <h3>{{ $product->name }}
                                        </h3>
                                        <a class="btn btn-primary px-5 py-2 m-3"
                                            href="{{ URL('product/purchase/' . $product->id) }}">Product Details</a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
