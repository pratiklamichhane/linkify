@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Categories</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Create Category</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <!-- paginate  links -->
            <tfoot>
                <tr>
                    <td colspan="3">
                        {{ $categories->links() }}
                    </td>
                </tr>
            </tfoot>
            
        </table>
    </div>
@endsection