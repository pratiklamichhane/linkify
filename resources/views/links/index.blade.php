@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Manage Links</h1>
        <a href="{{ route('links.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Link
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Search bar -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('links.index') }}" method="GET">
                <div class="row g-2 align-items-center">
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" name="search" class="form-control" placeholder="Search by title..." value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary me-2">Search</button>
                        <a href="{{ route('links.index') }}" class="btn btn-outline-secondary">Clear</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>URL</th>
                            <th>Category</th>
                            <th>Remaining Days</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($links->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center py-4"></td>
                                    <i class="fas fa-search fa-2x text-muted mb-2"></i>
                                    <p class="text-muted mb-0">No links found.</p>
                                </td>
                            </tr>
                        @endif
                        @foreach($links as $link)
                            <tr></tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $link->title }}</td>
                                <td>
                                    <a href="{{ $link->url }}" target="_blank" class="btn btn-sm btn-link">
                                        <i class="fas fa-external-link-alt"></i> Visit Link
                                    </a>
                                </td>
                                <td><span class="badge bg-info">{{ $link->category->name }}</span></td>
                                <td>{{ $link->remaining_days }} days</td>
                                <td class="text-end">
                                    <a href="{{ route('links.edit', $link->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('links.destroy', $link->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
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

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endpush</td>