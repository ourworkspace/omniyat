@extends('layouts.layout')
@section('page_title','Feature Projects List: : Omniyat')
@section('page_content')
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">FeatureProjects List</h4>
            </div>
        </div>
    </div>
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">FeatureProjects List</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dataTables">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Project Name</th>
                                            <th>Title</th>
                                            <th>SubTitle</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($featureProjects as $key => $featureProject)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>
                                                    @if(isset($featureProject->sliderOne->image) && file_exists($featureProject->sliderOne->image))
                                                        <img src="{{asset($featureProject->sliderOne->image)}}" class="img-circle img-responsive">
                                                    @endif
                                                </td>
                                                <td>{{$featureProject->project->project_name}}</td>
                                                <td>{{$featureProject->sliderOne->title}}</td>
                                                <td>{{$featureProject->sliderOne->sub_title}}</td>
                                                <td>
                                                    <span>
                                                        <a href="{{route('editFeatureProject', ['featureProject_id'=>$featureProject->id])}}"> <i class="fa fa-edit fa-1x"></i> </a>
                                                    </span>
                                                    <span>
                                                        <a href="{{route('deleteFeatureProject', ['featureProject_id'=>$featureProject->id])}}" onclick="return confirm('Do you want to delete Feature Project data?')"> <i class="fa fa-trash-o fa-1x"></i> </a>
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