@extends('layouts.master')
@section('title') login @endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                <form action="{{ route('user.login') }}" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="eamil" class="text-black-50">Enter Email</label>
                        <input type="email" class="form-control" id="eamil" name="email">
                    </div>
                    <div class="mb-2">
                        <label for="pas" class="text-black-50">Enter Password</label>
                        <input type="password" class="form-control" id="pas" name="password">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
