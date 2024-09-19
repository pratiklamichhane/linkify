@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create links</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('links.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="title">Category</label>
                <select name="category_id" id="" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                
            </div>

            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" name="url" id="url" class="form-control">
            </div>

            <div class="form-group">
                <label for="reminder_duration">Reminder Duration</label>
                <input type="number" name="reminder_duration" id="reminder_duration" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Link</button>
        </form>
    </div>
@endsection