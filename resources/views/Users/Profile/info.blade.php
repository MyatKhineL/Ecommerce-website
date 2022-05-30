@extends('layouts.master')
@section('title') Register @endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Your Profile
                </div>
                <div class="card-body">
                    <div class=" p-3 text-center">
                        <img src="{{ asset($user->image) }}"
                             alt=""
                             style="width: 200px; height: 200px; object-fit: cover; border: 2px solid #0b5ed7; border-radius: 50%">
                    </div>
                    <form action="{{ route('user.profile') }}"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="name" class="text-black-50">Your Name</label>
                            <input type="text" value="{{ $user->name }}" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-2">
                            <label for="eamil" class="text-black-50">Your Email</label>
                            <input type="email" value="{{ $user->email }}" class="form-control" id="eamil" name="email">
                        </div>
                        <div class="mb-2">
                            <label for="image" class="text-black-50">Change Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary">
                                Change Profile Info
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
