@extends('layouts/welcome')
@section('content')
<div class="row">
    <div class="col-sm-6">
        <h1 class="m-0">Team Member/h1>
      </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="float-left text-info">Add Team Member</h2>
                <a href="/Member" class="btn btn-primary btn-sm float-right">Back</a>
            </div>
            <div class="card-body">
                <div class="my-2">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                   @endif
                </div>
                <form action="/member" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" class="form-control" type="text" name="title">
                    </div>
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror  
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" type="text" name="name">
                    </div>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                     @enderror
                    
                    <div class="form-group">
                        <label for="position">position</label>
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
                        <input id="address" class="form-control" type="text" name="address">
                    </div>
                    @error('address')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="text" name="email">
                    </div>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                   
                        <div>
                            <label for="status">status</label>
                           <select name="status" id="status">
                               <option value="yes">Yes</option>
                               <option value="No">No</option>
                           </select>
                        </div>
                   
                    @error('status')
                    <span class="text-danger">{{ $message }}</span>
                     @enderror

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input id="image" class="form-control-file" type="file" name="image">
                    </div>
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                   @enderror

                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input id="facebook" class="form-control" type="text" name="facebook">
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input id="twitter" class="form-control" type="text" name="twitter">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input id="instagram" class="form-control" type="text" name="instagram">
                    </div>
                    <div class="form-group">
                        <label for="linkedln">Linkedln</label>
                        <input id="linkedln" class="form-control" type="text" name="linkedln">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Submit Team Record</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection