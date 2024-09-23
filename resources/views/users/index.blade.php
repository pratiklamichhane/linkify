@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>USERS</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Account Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>@if($user->is_banned) Banned @else Active @endif</td>
                        <td>
            <form action="{{route('users.ban' , $user->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-info">@if($user->is_banned)Unban @else Ban @endif</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <!-- paginate  links -->
        
            
        </table>
    </div>
@endsection