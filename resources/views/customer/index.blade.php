@extends('Layout.app')
@section('navbar')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Customers') }}
            </h2>
        </x-slot>
    </x-app-layout>
@endsection

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            {{-- <h3>Customers</h3> --}}
            <div class=" card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{ route('customers.create') }}" class="btn"
                                style="background-color: #4643d3; color: white;"><i class="fas fa-plus"></i> Create Customer
                            </a>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('customers.index') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search anything..."
                                        aria-describedby="button-addon2" name="search" value="{{ request()->search }}">
                                    <button class="btn btn-outline-secondary" type="submit"
                                        id="button-addon2">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <form action="{{ route('customers.index') }}" method="GET" class="form-order">
                                <div class="input-group mb-3">
                                    <select class="form-select" name="order" id=""
                                        onchange="$('.form-order').submit()">
                                        <option @selected(request()->order == 'desc') value="desc">Newest to Oldest </option>
                                        <option @selected(request()->order == 'asc') value="asc">Oldest to Newest</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2 text-end">
                            <a href="{{ route('customers.trash') }}" class="btn btn-dark"><i class="fas fa-trash-alt"></i>
                                Trash
                            </a>
                        </div>

                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-bordered" style="border: 1px solid #dddddd">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Email</th>
                                <th scope="col">BAN</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mycustomers as $mycustomer)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $mycustomer->first_name }}</td>
                                    <td>{{ $mycustomer->last_name }}</td>
                                    <td>{{ $mycustomer->phone }}</td>
                                    <td>{{ $mycustomer->email }}</td>
                                    <td>{{ $mycustomer->bank_account_number }}</td>

                                    <td>
                                        <a href="{{ route('customers.edit', $mycustomer->id) }}" style="color: #2c2c2c;"
                                            class="ms-1 me-1"><i class="far fa-edit"></i></a>
                                        <a href="{{ route('customers.show', $mycustomer->id) }}" style="color: #2c2c2c;"
                                            class="ms-1 me-1"><i class="far fa-eye"></i></a>
                                        <a href="javascript:;"
                                            onclick="
                                        if(confirm('Are you sure ?')) $('.form-{{ $mycustomer->id }}').submit()"
                                            style= "color: #2c2c2c;" class="ms-1 me-1"><i class="fas fa-trash-alt"></i></a>
                                        <form class="form-{{ $mycustomer->id }}"
                                            action="{{ route('customers.destroy', $mycustomer->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
