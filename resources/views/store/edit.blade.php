@extends('layouts.layout')
@section('content')
    <div class="row mx-5 my-4">
        <div class="col-12">
            <a href="{{ URL('dashboard') }}" class="btn btn-primary">Show Stores</a>

        </div>
    </div>
    <div class="row">
        <div class="col-12 mx-5">
            <form action="{{ URL('dashboard/store/update/' . $store->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name Store</label>
                    <input type="text" name='name' class="form-control" value="{{ $store->name }}">
                </div>
                <div class="form-group">
                    <label for="address">Address Store</label>
                    <input type="text" name='address' class="form-control" value="{{ $store->address }}">
                </div>
                <div class="form-group">
                    <label for="logo">Logo Store</label>
                    <input type="file" name='logo' class="form-control"><br />
                    @if ($store->logo)
                        <img src=" {{ asset('storage/' . $store->logo) }}" height="60" alt="">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@stop
