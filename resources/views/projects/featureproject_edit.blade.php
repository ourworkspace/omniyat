@extends('layouts.layout')
@section('page_title','Edit Feature Projects : : Omniyat')
@section('page_content')
    <style>
        #cke_1_contents{
            height: 200px !important;
        }
    </style>
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Edit FeatureProject</h4>
            </div>
        </div>
    </div>
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <form action="{{route('feature.projects.update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="featureProject_id" value="{{$featureProject->id}}">
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Edit FeatureProject</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group col-md-12">
                                <label for="ProjectName">Select Project Name <span class="text-danger">*</span></label>
                                <select class="form-control" name="projectId" required>
                                    <option value="">Select Project Name</option>
                                    @foreach($portfolios as $portfolio)
                                        <option value="{{$portfolio->id}}" {{ ($featureProject->portfolio_id == $portfolio->id) ? 'selected' : ''  }} >{{$portfolio->project_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <h6>Slide 1</h6>
                                <div class="row">
                                    <input type="hidden" name="sliderOne_id" value="{{$sliderOne->id}}">
                                    <div class="form-group col-md-12">
                                        <label for="ProjectName">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="{{ (isset($sliderOne->title)) ? $sliderOne->title : ''  }}" name="slider1Title" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="ProjectName">SubTitle </label>
                                        <input type="text" class="form-control" value="{{ (isset($sliderOne->sub_title)) ? $sliderOne->sub_title : ''  }}" name="slider1SubTitle" >
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <label for="slider1Image">Image </label>
                                                <input type="file" class="form-control" name="slider1Image" accept=".jpg,.jpeg,.png" style="padding: 6px">
                                            </div>
                                            @if(isset($sliderOne->image))
                                                <div class="col-md-2">
                                                    <a href="{{asset($sliderOne->image)}}" target="_blank">
                                                        <img src="{{asset($sliderOne->image)}}" style="height: 80px" class="img-thumbnail">
                                                    </a>
                                                    {{--<a href="javascript:0;"> <i class="fa fa-trash-o fa-1x"></i> </a>--}}
                                                    <input type="hidden" value="{{$sliderOne->image}}" name="uploadedMainSliderOne">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <h6>Slide 2</h6>
                                <input type="hidden" name="sliderTwo_id" value="{{$sliderMainTwo->id}}">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <label for="slider2Logo">Logo </label>
                                                <input type="file" class="form-control" name="slider2Logo" style="padding: 6px">
                                            </div>
                                            @if(isset($sliderMainTwo->logo) && file_exists($sliderMainTwo->logo))
                                                <div class="col-md-2">
                                                    <a href="{{asset($sliderMainTwo->logo)}}" target="_blank">
                                                        <img src="{{asset($sliderMainTwo->logo)}}" style="height: 80px" class="img-thumbnail">
                                                    </a>
                                                    {{--<a href="javascript:0;"> <i class="fa fa-trash-o fa-1x"></i> </a>--}}
                                                    <input type="hidden" value="{{$sliderMainTwo->logo}}" name="uploadedSliderTwoLogo">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <label for="slider2MainImage">Image </label>
                                                <input type="file" class="form-control" name="slider2MainImage" accept=".jpg,.jpeg,.png" style="padding: 6px">
                                            </div>
                                            @if(isset($sliderMainTwo->image) && file_exists($sliderMainTwo->image))
                                                <div class="col-md-2">
                                                    <a href="{{asset($sliderMainTwo->image)}}" target="_blank">
                                                        <img src="{{asset($sliderMainTwo->image)}}" style="height: 80px" class="img-thumbnail">
                                                    </a>
                                                    {{--<a href="javascript:0;"> <i class="fa fa-trash-o fa-1x"></i> </a>--}}
                                                    <input type="hidden" value="{{$sliderMainTwo->image}}" name="uploadedSliderTwoImage">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 bulletSlide2 slider2_field_wrapper">
                                        <h6>Slider Bullet Points</h6>
                                        @if(count($sliderTwo) > 0)
                                            @foreach($sliderTwo as $key => $value)
                                                <div class="row {{ ($key == 0) ? 'slider2_field_parent' : 'slider2_field_child' }} ">
                                                    <input type="hidden" value="{{$value->id}}" name="slider2Ids[]">
                                                    <div class="col-md-5 form-group ">
                                                        @if($key == 0) <label for="Logo">Image </label> @endif
                                                        @if(isset($value->bp_image) && file_exists($value->bp_image))
                                                            <small class="pull-right">
                                                                <a href="{{asset($value->bp_image)}}" target="_blank">View Image</a> &nbsp;&nbsp;&nbsp;
                                                            </small>
                                                        @endif
                                                        <input type="file" class="form-control" accept=".jpg,.jpeg,.png" name="slider2Image[]" style="padding: 6px">
                                                    </div>
                                                    <input type="hidden" name="uploadedSlider2BulletImages[]" value="{{$value->bp_image}}">
                                                    <div class="form-group col-md-5" @if($key != 0 && isset($value->bp_image) && file_exists($value->bp_image)) style="margin-top: 15px" @endif >
                                                        @if($key == 0) <label for="ProjectName">Title </label> @endif
                                                        <input type="text" value="{{$value->bp_title}}" class="form-control" name="slider2Title[]">
                                                    </div>
                                                    <div class="col-md-2" @if($key == 0) style="padding: 18px 15px" @endif @if($key != 0 && isset($value->bp_image) && file_exists($value->bp_image)) style="margin-top: 15px" @endif>
                                                        <a href="javascript:0;" class="btn {{ ($key == 0) ? 'btn-success slider2_add_button' : 'btn-danger slider2_remove_button' }}">{{ ($key == 0) ? 'Add' : 'Remove' }}</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row slider2_field_parent">
                                                <div class="col-md-5 form-group ">
                                                    <label for="Logo">Image </label>
                                                    <input type="file" class="form-control" accept=".jpg,.jpeg,.png" name="slider2Image[]" style="padding: 6px">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="ProjectName">Title </label>
                                                    <input type="text" class="form-control" name="slider2Title[]">
                                                </div>
                                                <div class="col-md-2" style="padding: 18px 15px">
                                                    <a href="javascript:0;" class="btn btn-success slider2_add_button">Add</a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-body">

                            <div class="col-md-12">
                                <h6>Slide 3</h6>
                                <input type="hidden" name="sliderThree_id" value="{{$sliderMainThree->id}}">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <label for="slider3MainImage">Image </label>
                                                <input type="file" class="form-control" name="slider3MainImage" accept=".jpg,.jpeg,.png" style="padding: 6px">
                                            </div>
                                            @if(isset($sliderMainThree->image) && file_exists($sliderMainThree->image))
                                                <div class="col-md-2">
                                                    <a href="{{asset($sliderMainThree->image)}}" target="_blank">
                                                        <img src="{{asset($sliderMainThree->image)}}" style="height: 80px" class="img-thumbnail">
                                                    </a>
                                                    {{--<a href="javascript:0;"> <i class="fa fa-trash-o fa-1x"></i> </a>--}}
                                                    <input type="hidden" value="{{$sliderMainThree->image}}" name="uploadedSliderThreeImage">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 bulletSlide2 slider3_field_wrapper">
                                        <h6>Slider Bullet Points</h6>
                                        @if(count($sliderThree) > 0)
                                            @foreach($sliderThree as $key => $value)
                                                <div class="row {{ ($key == 0) ? 'slider3_field_parent' : 'slider3_field_child' }} ">
                                                    <input type="hidden" value="{{$value->id}}" name="slider3Ids[]">
                                                    <div class="col-md-5 form-group ">
                                                        @if($key == 0) <label for="Logo">Image </label> @endif
                                                        @if(isset($value->bp_image) && file_exists($value->bp_image))
                                                            <small class="pull-right">
                                                                <a href="{{asset($value->bp_image)}}" target="_blank">View Image</a> &nbsp;&nbsp;&nbsp;
                                                            </small>
                                                        @endif
                                                        <input type="file" class="form-control" accept=".jpg,.jpeg,.png" name="slider3Image[]" style="padding: 6px">
                                                    </div>
                                                    <input type="hidden" name="uploadedSlider3BulletImages[]" value="{{$value->bp_image}}">
                                                    <div class="form-group col-md-5" @if($key != 0 && isset($value->bp_image) && file_exists($value->bp_image)) style="margin-top: 15px" @endif >
                                                        @if($key == 0) <label for="ProjectName">Title </label> @endif
                                                        <input type="text" value="{{$value->bp_title}}" class="form-control" name="slider3Title[]">
                                                    </div>
                                                    <div class="col-md-2" @if($key == 0) style="padding: 18px 15px" @endif @if($key != 0 && isset($value->bp_image) && file_exists($value->bp_image)) style="margin-top: 15px" @endif >
                                                        <a href="javascript:0;" class="btn {{ ($key == 0) ? 'btn-success slider3_add_button' : 'btn-danger slider3_remove_button' }}"> {{ ($key == 0) ? 'Add' : 'Remove' }} </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row slider3_field_parent">
                                                <div class="col-md-5 form-group ">
                                                    <label for="Logo">Image </label>
                                                    <input type="file" class="form-control" accept=".jpg,.jpeg,.png" name="slider3Image[]" style="padding: 6px">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="ProjectName">Title </label>
                                                    <input type="text" class="form-control" name="slider3Title[]">
                                                </div>
                                                <div class="col-md-2" style="padding: 18px 15px">
                                                    <a href="javascript:0;" class="btn btn-success slider3_add_button">Add</a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-body">

                            <div class="form-group col-md-12">
                                <label for="ProjectName">Explore label Name </label>
                                <input type="text" class="form-control" value="{{ ($featureProject->explore_label) ? $featureProject->explore_label : '' }}" name="exploreTitle" required>
                            </div>

                            <div class="form-group col-md-12">
                                <input type="submit" value="Update" class="btn btn-success pull-left">
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            var slider2_addButton = $('.slider2_add_button'); //Add button selector
            var slider2_wrapper = $('.slider2_field_wrapper'); //Input field wrapper
            var slider2_fieldHTML = '<div class="row slider2_field_child"><div class="col-md-5 form-group "><input type="file" class="form-control" name="slider2Image[]" accept=".jpg,.jpeg,.png" style="padding: 6px"></div><div class="form-group col-md-5"><input type="text" class="form-control" name="slider2Title[]"></div><div class="col-md-2"><a href="javascript:0;" class="btn btn-danger slider2_remove_button">Remove</a></div></div>'; //New input field html


            //Once add button is clicked
            $(slider2_addButton).click(function(){
                $(slider2_wrapper).append(slider2_fieldHTML); //Add field html
            });

            //Once remove button is clicked
            $(slider2_wrapper).on('click', '.slider2_remove_button', function(e){
                e.preventDefault();
                $(this).parent().parent().remove(); //Remove field html
            });
        });

        $(document).ready(function(){
            var slider3_addButton = $('.slider3_add_button'); //Add button selector
            var slider3_wrapper = $('.slider3_field_wrapper'); //Input field wrapper
            var slider3_fieldHTML = '<div class="row slider3_field_child"><div class="col-md-5 form-group "><input type="file" class="form-control" name="slider3Image[]" accept=".jpg,.jpeg,.png" style="padding: 6px"></div><div class="form-group col-md-5"><input type="text" class="form-control" name="slider3Title[]"></div><div class="col-md-2"><a href="javascript:0;" class="btn btn-danger slider3_remove_button">Remove</a></div></div>'; //New input field html


            //Once add button is clicked
            $(slider3_addButton).click(function(){
                $(slider3_wrapper).append(slider3_fieldHTML); //Add field html
            });

            //Once remove button is clicked
            $(slider3_wrapper).on('click', '.slider3_remove_button', function(e){
                e.preventDefault();
                $(this).parent().parent().remove(); //Remove field html
            });
        });
    </script>
@endsection