@extends('layouts/welcome')
@section('content')
<div class="row">
    <div class="col-sm-6">
        <h1 class="m-0">Team Member Page</h1>
      </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="float-left text-info">Edit Team Member</h2>
                <a href="/member" class="btn btn-primary btn-sm float-right">Back</a>
            </div>
            <div class="card-body">
            
                <div class="my-2">
                   @if (session('message'))
                   <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                   </div>
                       
                   @endif
                </div>

                <form action="/member/{{ $member->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" class="form-control" type="text" name="title" value="{{ $member->title }}">
                    </div>
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ $member->name }}">
                    </div>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                
                    <div class="form-group">
                        <label for="position">Position</label>
                        <select name="position" id="position">
                            <option value="president">President</option>
                            <option value="head_executive">Head Executive</option>
                            <option value="executive">Executive</option>
                            <option value="member">Membership</option>
                            <option value="others">Others</option>
                       </select>
                    </div>
                    @error('position')
                    <span class="text-danger">{{ $message }}</span>
                   @enderror

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input id="address" class="form-control" type="text" name="address" value="{{ $member->address }}">
                    </div>
                    @error('address')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="text" name="email" value="{{ $member->email }}">
                    </div>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                    <div class="form-group">
                        <label for="status">status</label>
                       <select name="status" id="status">
                           <option value="yes">Yes</option>
                           <option value="No">No</option>
                       </select>
                    </div>
                    @error('status')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div>
                        <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" width="100">
                    </div>

                    <div class="form-group">
                        <label for="image">Do You want to change the Image?</label>
                        <input id="image" class="form-control-file" type="file" name="image">
                    </div>
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input id="facebook" class="form-control" type="text" name="facebook" value="{{ $member->facebook }}">
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input id="twitter" class="form-control" type="text" name="twitter" value="{{ $member->twitter }}">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input id="instagram" class="form-control" type="text" name="instagram" value={{ $member->instagram }}>
                    </div>
                    <div class="form-group">
                        <label for="linkedln">Linkedln</label>
                        <input id="linkedln" class="form-control" type="text" name="linkedln" value="{{ $member->linkedln }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Update member Record</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    
@endsection