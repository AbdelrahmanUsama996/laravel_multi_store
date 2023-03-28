@extends('layouts.layout')
@section('content')
    <div class="row mx-3  ">
        <div class="d-flex col-12 flex-row justify-content-between">
            <div>
                <a href="{{ URL('dashboard/store/create') }}" class="btn btn-primary px-5 ">
                    <h4>+ Create</h4>
                </a>
            </div>
            <h3>Stores</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mx-3 mt-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stores as $store)
                        <tr>
                            <td><img src="{{ $store->logo }}" height="50" width="90" alt=""></td>
                            <td>{{ $store->name }}</td>
                            <td>{{ $store->address }}</td>
                            <td><a href="{{ url('dashboard/store/edit/' . $store->id) }}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="{{ url('dashboard/store/delete/' . $store->id) }}" method="POST">
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
            {{ $stores->links() }}

        </div>
    </div>
@stop
