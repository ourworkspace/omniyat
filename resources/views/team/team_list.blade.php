@extends('layouts.layout')
@section('page_title','Team List: : Omniyat')
@section('page_content')
    <style>
        #cke_1_contents{
            height: 200px !important;
        }
    </style>
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Team List</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Team List</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped customDataTables">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th width="60">Image</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($team as $key => $value)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td align="center">
                                                    @if(isset($value->image) && file_exists($value->image))
                                                        <img src="{{asset($value->image)}}" class="img-circle">
                                                    @else
                                                        <img src="{{asset('public/default_images/image.svg')}}" class="img-circle">
                                                    @endif
                                                </td>
                                                <td> {{$value->name}} </td>
                                                <td> {{$value->designation}} </td>
                                                <td width="100" align="center">
                                                    <span>
                                                        <a href="{{route('team.edit',['team_id'=>$value->id,'team_name'=>strtolower(urlencode($value->name))])}}"> <i class="fa fa-edit fa-1x"></i> </a>
                                                    </span>
                                                    <span>
                                                        <a href="{{route('team.delete',['team_id'=>$value->id])}}" onclick="return confirm('Do you want to delete team member?')"> <i class="fa fa-trash-o fa-1x"></i> </a>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection