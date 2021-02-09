@extends('layouts.layout')
@section('page_title','Amenities : : Nshama')
@section('page_content')
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Amenities</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-12">
                        <span class="card-title pull-left">Add / Edit Amenities</span>
                    </div>
                </div>
                <div class="card-body">
                    <form class="forms-sample" method="post" action="{{ (isset($amenities->id)) ? route('amenities.update') : route('amenities.save')}}" enctype="multipart/form-data">

                        <div class="row">
                            {{ csrf_field() }}
                            @if(isset($amenities) && isset($amenities->id))
                                <input type="hidden" value="{{$amenities->id}}" name="amenitiesId">
                            @endif
                            <div class="form-group col-md-12">
                                <label for="titleName"> Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="titleName" required="required" id="titleName" value="{{ (isset($amenities->name)) ? $amenities->name : ''  }}"  >
                            </div>


                            <div class="col-md-12">
                                <div class="row">

                                    <div class="form-group col-md-10">
                                        <label> Icon Image @if(!isset($amenities->image))  <span class="text-danger">*</span> @endif </label>
                                        <input type="file" style="padding: 5px 10px;" class="form-control fileInput2" name="imageIcon[]" @if(!isset($amenities->image)) required="required" @endif accept=".jpeg,.jpg,.png,.svg,.gif">
                                    </div>

                                    <div class="col-md-2">
                                        @if(isset($amenities->image))
                                            <img src="{{asset($amenities->image)}}">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success mr-2"> {{  (isset($amenities->id)) ? 'Update' : 'Save' }} </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-12">
                        <span class="card-title pull-left">Amenities List</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-striped table-bordered dataTables">
                            <thead>
                            <tr class="bg-black">
                                <th>#</th>
                                <th> Icon</th>
                                <th> Name</th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($amenitiesData as $key => $amenities)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            @if(!empty($amenities->image))
                                                <img src="{{asset($amenities->image)}}" />
                                            @endif
                                        </td>
                                        <td>{{$amenities->name}}</td>
                                        <td align="center">
                                            <span title="edit" data-toggle="tooltip"><a href="{{route('amenities.edit',['amenitiesId'=>$amenities->id])}}"><i class="fa fa-edit fa-20x"></i></a></span>
                                            <span title="delete" data-toggle="tooltip"><a href="{{route('amenities.delete',['amenitiesId'=>$amenities->id])}}" onclick="return confirm('Do you want to delete?')"><i class="fa fa-trash-o fa-20x"></i></a></span>
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
@endsection