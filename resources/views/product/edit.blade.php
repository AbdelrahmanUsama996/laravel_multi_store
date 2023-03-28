@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-12 mx-5 my-4">
            <a href="{{ URL('dashboard/product') }}" class="btn btn-primary px-5 py-2">Show Products</a>

        </div>
    </div>
    <div class="row">
        <div class="col-12 mx-5">
            <form action="{{ URL('dashboard/product/update/' . $product->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name Product</label>
                    <input type="text" name='name' class="form-control" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="description">Description Product</label>
                    <input type="text" name='description' class="form-control" value="{{ $product->description }}">
                </div>
                <div class="form-group">
                    <label for="logo">Price</label>
                    <input type="text" name='price' class="form-control" value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <label for="discount">Discount</label>
                    <input type="text" name='discount' class="form-control" value="{{ $product->discount }}">
                </div>
                <div class="form-group">
                    <label for="store_id">Store Name</label>
                    <select name="store_id" id="" class="form-control">
                        @foreach ($product as $key => $value)
                            <option value="{{ $key = $product->store->id }}" selected>{{ $product->store->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image Product</label>
                    <input type="file" name='image' class="form-control"><br />
                    @if ($product->image)
                        <img src=" {{ asset('storage/' . $product->image) }}" height="60" alt="">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@stop
