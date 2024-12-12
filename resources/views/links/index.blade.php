@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Links</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- search bar -->
        <form action="{{ route('links.index') }}" method="GET">
            <div class="row">
            <div class="form-group col-8">
                <input type="text" name="search" class="form-control" placeholder="Search by title">
            </div>
            <button type="submit" class="btn btn-primary" class="col-4">Search</button>
            <a href="{{ route('links.index') }}" class="btn btn-primary mb-3">Clear Search</a>
            </div>
        </form>


        <a href="{{ route('links.create') }}" class="btn btn-primary mb-3">Create Link</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>URL</th>
                    <th>Category</th>
                    <th>Remaining Days</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($links->isEmpty())
                    <tr>
                        <td colspan="7" class="text-bold text-center"><b>No links found.</b></td>
                    </tr>
                @endif
                @foreach($links as $link)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $link->title }}</td>
                        <td><a href="{{$link->url}}" target="_blank">Click Here</a></td>
                        <td>{{ $link->category->name }}</td>
                        <td>{{ $link->remaining_days }}</td>
                        <td>
                            <a href="{{ route('links.edit', $link->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('links.destroy', $link->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    

@endsection