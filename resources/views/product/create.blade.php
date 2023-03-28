@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-12 mx-5 my-4 ">
            <a href="{{ URL('dashboard/product') }}" class="btn btn-primary px-5 py-2">Show Products</a>

        </div>
    </div>
    <div class="row">
        <div class="col-12 mx-5">
            <form enctype="multipart/form-data" action="{{ URL('dashboard/product/store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name Product</label>
                    <input type="text" name='name' class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description Product</label>
                    <input type="text" name='description' class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name='price' class="form-control">
                </div>
                <div class="form-group">
                    <label for="discount">Discount</label>
                    <input type="text" name='discount' class="form-control">
                </div>
                <div class="form-group">
                    <label for="store_id">Store Name</label>
                    <select name="store_id" id="" class="form-control">
                        <option value="-1"></option>
                        @foreach ($stores as $store)
                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image Product</label>
                    <input type="file" name='image' class="form-control">
                </div>
                <button type="submit" class="btn btn-primary px-5 py-2">Save</button>
            </form>
        </div>
    </div>
@stop
