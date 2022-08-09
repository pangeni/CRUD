@extends('layouts/welcome')
@section('content')
<div class="row">
    <div class="col-sm-6">
        <h1 class="m-0">member Page</h1>
      </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card-header">
                <h2 class="float-left text-info">Edit, View member</h2>
                <a href="/member/create" class="btn btn-primary btn-sm float-right">Create New member</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>name</th>
                            <th>slug</th>
                            <th>type</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Facebook</th>
                            <th>Instagram</th>
                            <th>Twitter</th>
                            <th>Linkedln</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $index=> $member)
                        <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $member->title }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->slug }}</td>
                        <td>{{ $member->type }}</td>
                        <td>{{ $member->address }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->status }}</td>
                        <td><img src="{{ asset($member->image) }}" alt="{{ $member->name }}" width="70"></td>
                        <td>{{ $member->facebook }}</td>
                        <td>{{ $member->twitter }}</td>
                        <td>{{ $member->instagram }}</td>
                        <td>{{ $member->linkedln }}</td>
                        <td>
                            <form action="/members/{{ $member->id }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="/members/{{ $member->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                                <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm">Delete</button>
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
