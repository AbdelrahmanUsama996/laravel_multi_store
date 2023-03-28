@extends('layouts.layout')
@section('content')
    <div class="row mx-3  ">
        <div class="d-flex col-12 flex-row justify-content-between">
            <h3>Transactions</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mx-3 mt-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Store Name</th>
                        <th>Purchase Price</th>
                        <th>Timestamp</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        @if ($transaction->product)
                            <tr>
                                <td>{{ $transaction->product->name }}</td>
                                <td>{{ $transaction->product->store->name }}</td>
                                <td>{{ $transaction->product->price }}</td>
                                <td>{{ $transaction->created_at }}</td>

                                <td>
                                    <form action="{{ url('dashboard/transaction/delete/' . $transaction->id) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            {{ $transactions->links() }}

        </div>
    </div>
@stop
