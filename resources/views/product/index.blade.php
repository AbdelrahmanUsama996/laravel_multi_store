@extends('layouts.layout')
@section('content')
    <div class="row mx-3  ">
        <div class="d-flex col-12 flex-row justify-content-between">
            <div><a href="{{ URL('dashboard/product/create') }}" class="btn btn-primary px-5">
                    <h4>+ Create</h4>
                </a>
            </div>
            <h3>Products</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mx-3 mt-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image Product</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Store Name</th>
                        <th>Basic Price</th>
                        <th>Discount</th>
                        <th>Final Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><img src="{{ $product->image }}" height="50" width="100" alt=""></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->store->name ?? null }}</td>
                            <td>{{ $product->price }} $</td>
                            <td>{{ $product->discount }} %</td>
                            <td>{{ $product->final_price }} $</td>
                            <td><a href="{{ url('dashboard/product/edit/' . $product->id) }}"
                                    class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="{{ url('dashboard/product/delete/' . $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            {{ $products->links() }}

        </div>
    </div>
@stop
