@extends('layouts.master')
@section('title') Register @endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Register
            </div>
            <div class="card-body">
                <form action="{{ route('user.register') }}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="text-black-50">Enter Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-2">
                        <label for="eamil" class="text-black-50">Enter Email</label>
                        <input type="email" class="form-control" id="eamil" name="email">
                    </div>
                    <div class="mb-2">
                        <label for="pas" class="text-black-50">Enter Password</label>
                        <input type="password" class="form-control" id="pas" name="password">
                    </div>
                    <div class="mb-2">
                        <label for="image" class="text-black-50">Choose Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
