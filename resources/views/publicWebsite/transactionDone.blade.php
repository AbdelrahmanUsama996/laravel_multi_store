@extends('layouts.publicWebsiteLayout')
@section('content')
    <div class="row m-5">
        <div class="col-12 m-5">
            <div class="d-flex flex-column justify-content-center align-items-center m5">
                <h2>Your ordered this product successfully</h2>
                <a class="read_more" href="{{ URL('/') }}">Back To Store</a>
            </div>
        </div>
    </div>
@endsection
