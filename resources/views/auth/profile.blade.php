@extends('layouts.layout')
@section('page_title','Profile : : Omniyat')
@section('page_content')
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title" style="white-space: nowrap;">Profile</h4>
        </div>
    </div>
</div>
<div class="row justify-content-center align-items-center">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{url('admin/profile/updatedata')}}" enctype="multipart/form-data">
                    
                    <div class="row">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$user->id}}" name="edit_id">
                        <div class="form-group col-md-6">
                            <label for="name"> Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{$user->name}}" name="name" required="required" id="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email"> Mail id <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{$user->email}}" name="email" required="required" id="email">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="password"> Password </label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="cpassword"> Confirm Password </label>
                            <input type="password" class="form-control" name="cpassword" id="cpassword">
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success mr-2">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection