@extends('layouts.publicWebsiteLayout')
@section('content')
    <!-- banner -->
    <section class="banner_main">
        <div id="banner1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="carousel-caption">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-bg">
                                        <span>Computer And Laptop</span>
                                        <h1>Accessories</h1>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority have suffered alteration in some form, by injected humour, or </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- end banner -->

    <!-- products -->
    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>My Stores</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="our_products">
                        <div class="row">
                            @foreach ($stores as $store)
                                <div class="col-md-4 d-flex  margin_bottom1">
                                    <div class="d-flex flex-column product_box">
                                        <figure><img src="{{ $store->logo }}" alt="#" /></figure>
                                        <h3>
                                            {{ $store->name }}
                                        </h3>
                                        <a class="btn btn-primary "
                                            href="{{ URL('store/' . $store->id . '/product') }}">Display Products</a>

                                    </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end products -->
@endsection
