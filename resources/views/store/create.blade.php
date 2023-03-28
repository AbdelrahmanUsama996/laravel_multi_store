@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-12 mx-5 my-4 ">
            <a href="{{ URL('dashboard') }}" class="btn btn-primary px-5 py-2">Show Stores</a>

        </div>
    </div>
    <div class="row">
        <div class="col-12 mx-5">
            <form enctype="multipart/form-data" action="{{ URL('dashboard/store/store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name Store</label>
                    <input type="text" name='name' class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address Store</label>
                    <input type="text" name='address' class="form-control">
                </div>
                <div class="form-group">
                    <label for="logo">Logo Store</label>
                    <input type="file" name='logo' class="form-control">
                </div>
                <button type="submit" class="btn btn-primary px-5 py-2">Save</button>
            </form>
        </div>
    </div>
@stop
