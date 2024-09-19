@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Links</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('links.create') }}" class="btn btn-primary">Create Link</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>URL</th>
                    <th>Category</th>
                    <th>Reminder Duration</th>
                    <th>Remaining Days</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($links as $link)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $link->title }}</td>
                        <td><a href="{{$link->url}}" target="_blank">Click Here</a></td>
                        <td>{{ $link->category->name }}</td>
                        <td>{{ $link->reminder_duration }}</td>
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