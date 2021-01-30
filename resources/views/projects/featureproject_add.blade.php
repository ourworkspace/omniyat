@extends('layouts.layout')
@section('page_title','Add Feature Projects : : Omniyat')
@section('page_content')
    <style>
        #cke_1_contents{
            height: 200px !important;
        }
    </style>
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Add FeatureProject</h4>
            </div>
        </div>
    </div>
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <form action="{{route('feature.projects.save')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Add FeatureProject</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group col-md-12">
                                <label for="ProjectName">Select Project Name <span class="text-danger">*</span></label>
                                <select class="form-control" name="projectId" required>
                                    <option value="">Select Project Name</option>
                                    @foreach($portfolios as $portfolio)
                                        <option value="{{$portfolio->id}}">{{$portfolio->project_name}}</option>
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
                                    <div class="form-group col-md-12">
                                        <label for="ProjectName">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="slider1Title" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="ProjectName">SubTitle </label>
                                        <input type="text" class="form-control" name="slider1SubTitle" >
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="slider1Image">Image <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="slider1Image" accept=".jpg,.jpeg,.png" required style="padding: 6px">
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
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="slider2Logo">Logo <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="slider2Logo" required style="padding: 6px">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="slider2MainImage">Image <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="slider2MainImage" accept=".jpg,.jpeg,.png" required style="padding: 6px">
                                    </div>
                                    <div class="col-md-12 bulletSlide2 slider2_field_wrapper">
                                        <h6>Slider Bullet Points</h6>
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
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="slider3MainImage">Image <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="slider3MainImage" accept=".jpg,.jpeg,.png" required style="padding: 6px">
                                    </div>
                                    <div class="col-md-12 bulletSlide2 slider3_field_wrapper">
                                        <h6>Slider Bullet Points</h6>
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
                                <input type="text" class="form-control" name="exploreTitle" required>
                            </div>

                            <div class="form-group col-md-12">
                                <input type="submit" value="Save" class="btn btn-success pull-left">
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