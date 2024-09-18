@extends('layouts.app')


@section('content')
    <h1>Edit Profile</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data"  >
        @csrf
        @method('PUT')
        <!-- image upload -->
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="profile_image" class="form-control">
        </div>
        @if(auth()->user()->profile_image)
            <img src="{{asset(auth()->user()->profile_image)}}" alt="" width="150px">
        @endif
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" value="{{ auth()->user()->username }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" value="{{ auth()->user()->phone }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>


@endsection