@extends('layouts.app')


@section('content')
    @if($name)
        <h1>Hello, {{ $name }}</h1>
    @else
        <h1>Hello, You dont Have Name</h1>
    @endif
@endsection