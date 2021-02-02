@extends('layouts.layout')
@section('page_title','Portfolio : : Omniyat')
@section('page_content')

    <style>
        #cke_1_contents{
            height: 200px !important;
        }
    </style>
    <!-- <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Add Portfolio</h4>
            </div>
        </div>
    </div> -->
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <form action="{{route('portfolio.save')}}" enctype="multipart/form-data" class="row" method="post">
                {{csrf_field()}}
                
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Add Portfolio</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="ProjectName">Select Category <span class="text-danger">*</span></label>
                                    <select class="form-control" name="portfolio_category" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('category'))
                                        <span class="text-danger">{{ $errors->first('category') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ProjectName">Portfolio Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="portfolio_project_name" required>
                                    @if($errors->has('ProjectName'))
                                        <span class="text-danger">{{ $errors->first('ProjectName') }}</span>
                                    @endif
                                </div>
                                <!--<div class="form-group col-md-6">
                                    <label for="TitleName">Title</label>
                                    <input type="text" class="form-control" name="portfolio_title_name">
                                    @if($errors->has('TitleName'))
                                        <span class="text-danger">{{ $errors->first('TitleName') }}</span>
                                    @endif
                                </div>-->
                                <div class="form-group col-md-6">
                                    <label for="portfolio_project_image">Background Picture <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="portfolio_project_image" required style="padding: 6px">
                                    @if($errors->has('portfolio_project_image'))
                                        <span class="text-danger">{{ $errors->first('portfolio_project_image') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Logo">Logo Image</label>
                                    <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="portfolio_project_logo" style="padding: 6px">
                                    @if($errors->has('Logo'))
                                        <span class="text-danger">{{ $errors->first('Logo') }}</span>
                                    @endif
                                </div>
                            </div>                                
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">About</h5>
                        </div>
                        <div class="card-body">
                            <div class="row aboutTab">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <!-- <h6 class="col-md-12">Layout Settings</h6> -->
                                        <div class="col-md-6">
                                            <label for="aboutThemeColor">Theme Color <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="about_theme_color">
                                                <option value="">Select Theme Color</option>
                                                @foreach($theme as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="aboutTextAlignment">Text Alignment <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="about_text_alignment">
                                                <option value="">Select Text Alignment</option>
                                                @foreach($textAlignments as $value)
                                                    <option value="{{$value}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- <div class="col-md-4">
                                            <label for="aboutThemeColor">Image Alignment <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="about_image_position">
                                                <option value="">Select Image Alignment</option>
                                                @foreach($imageSectionOptions as $key => $isovalue)
                                                    <option value="{{$isovalue}}">{{$isovalue}}</option>
                                                @endforeach
                                            </select>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- <hr style="width:97%;margin-top: 2px;"> -->
                                <div class="form-group col-md-12">
                                    <label for="TitleName">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="about_title_name">
                                    @if($errors->has('TitleName'))
                                        <span class="text-danger">{{ $errors->first('TitleName') }}</span>
                                    @endif
                                </div>
                               <div class="form-group col-md-6">
                                    <label for="Logo">Background Picture <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="about_background_picture" required style="padding: 6px">
                                    @if($errors->has('Logo'))
                                        <span class="text-danger">{{ $errors->first('Logo') }}</span>
                                    @endif
                                </div>
                               <div class="form-group col-md-6">
                                    <label for="Logo">Logo Image</label>
                                    <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="about_project_logo" style="padding: 6px">
                                    @if($errors->has('Logo'))
                                        <span class="text-danger">{{ $errors->first('Logo') }}</span>
                                    @endif
                                </div>
                               
                                <div class="form-group col-md-12">
                                    <label for="Description">Description </label>
                                    <textarea class="form-control" rows="6" id="about_description" name="about_description"></textarea>
                                    <script>
                                        CKEditorChange('about_description','myconfigText.js');
                                    </script>
                                    @if($errors->has('about_description'))
                                        <span class="text-danger">{{ $errors->first('about_description') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Description">Description 2</label>
                                    <textarea class="form-control" rows="4" id="about_description_2" name="about_description_2"></textarea>
                                    <script>
                                        CKEditorChange('about_description_2','myconfigText.js');
                                    </script>
                                    @if($errors->has('about_description_2'))
                                        <span class="text-danger">{{ $errors->first('about_description_2') }}</span>
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Location</h5>
                        </div>
                        <div class="card-body">
                            <div class="row locationTab">
                               <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="locationThemeColor">Theme Color <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="location_theme_color">
                                                <option value="">Select Theme Color</option>
                                                @foreach($theme as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="locationTextAlignment">Text Alignment <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="location_text_alignment">
                                                <option value="">Select Text Alignment</option>
                                                @foreach($textAlignments as $value)
                                                    <option value="{{$value}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="TitleName">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="location_title_name">
                                    @if($errors->has('location_title_name'))
                                        <span class="text-danger">{{ $errors->first('location_title_name') }}</span>
                                    @endif
                                </div>
                               <div class="form-group col-md-12">
                                    <label for="Logo">Background Picture <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="location_background_picture" required style="padding: 6px">
                                    @if($errors->has('location_background_picture'))
                                        <span class="text-danger">{{ $errors->first('location_background_picture') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Logo">Location icon </label>
                                    <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="location_icon_image" style="padding: 6px">
                                    @if($errors->has('location_icon_image'))
                                        <span class="text-danger">{{ $errors->first('location_icon_image') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Description">Description</label>
                                    <textarea class="form-control" rows="6" id="location_description" name="location_description"></textarea>
                                    <script>
                                        CKEditorChange('location_description','myconfigText.js');
                                    </script>
                                    @if($errors->has('location_description'))
                                        <span class="text-danger">{{ $errors->first('location_description') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Design</h5>
                        </div>
                        <div class="card-body">
                            <div class="row designTab">
                                <div class="col-md-12 mb-2">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="customRadio" name="design_tabs_type" value="withTabs" checked>
                                        <label class="custom-control-label pt-1" for="customRadio">With Tabs</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="customRadio2" name="design_tabs_type" value="withOutTabs">
                                        <label class="custom-control-label pt-1" for="customRadio2">WithOut Tabs</label>
                                    </div>
                                </div>

                                <div id="tabContentBox" class="col-md-12"></div>
                                
                                <script>
                                    function designTabs(checkedDesignValue){
                                        $.ajax({
                                            type: "GET",
                                            url: "{{url('cms/portfolio/designTabs')}}/"+checkedDesignValue,
                                            success: function (designFields) {
                                                $("#tabContentBox").html(designFields);
                                            }
                                        });
                                    }
                                    $(document).ready(function() {
                                        var checkedDesignValue = $("input[name$='design_tabs_type']").val();
                                        designTabs(checkedDesignValue)
                                        $("input[name$='design_tabs_type']").click(function() {
                                            var checkedDesignValue = $(this).val();
                                            designTabs(checkedDesignValue);
                                        });
                                    });
                                </script>
                            </div>
                            <!-- <div class="form-group col-md-12">
                                <label for="design_gallery_images">Gallery Images</label>
                                <input type="file" class="form-control fileInput4" accept=".jpg,.png,.jpeg" name="design_gallery_images[]" style="padding: 6px" multiple>
                                @if($errors->has('design_gallery_images'))
                                    <span class="text-danger">{{ $errors->first('design_gallery_images') }}</span>
                                @endif
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Amenities & Facilities</h5>
                        </div>
                        <div class="card-body">
                            <div class="row amenitiesAndFacilitiesTab">                               
                               <div class="form-group col-md-12">
                                    <label for="TitleName">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="amenities_facilities_title_name">
                                    @if($errors->has('amenities_facilities_title_name'))
                                        <span class="text-danger">{{ $errors->first('amenities_facilities_title_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="amenities_facilities_logo">Logo Image</label>
                                    <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="amenities_facilities_logo" style="padding: 6px" id="amenities_facilities_logo">
                                    @if($errors->has('amenities_facilities_logo'))
                                        <span class="text-danger">{{ $errors->first('amenities_facilities_logo') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="Description">Amenities </label>
                                    <div class="amenitiesTextBox">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <input type="text" class="form-control" name="amenities_facilities_amenities[]" placeholder="Amenity Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="javascript:0;" class="btn btn-success amtFtsAddMore"> + </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Description">Description</label>
                                    <textarea class="form-control" rows="6" id="amtFltDescription" name="amenities_facilities_description"></textarea>
                                    <script>
                                        CKEditorChange('amtFltDescription','myconfigText.js');
                                    </script>
                                    @if($errors->has('amtFltDescription'))
                                        <span class="text-danger">{{ $errors->first('amtFltDescription') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Logo">Gallery Images</label>
                                    <input type="file" class="form-control fileInput4" accept=".jpg,.png,.jpeg" name="amenities_facilities_gallery_images[]" style="padding: 6px" multiple>
                                    @if($errors->has('locationBackgroundPicture'))
                                        <span class="text-danger">{{ $errors->first('locationBackgroundPicture') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">LifeStyle</h5>
                        </div>
                        <div class="card-body">
                            <div class="row lifeStyleTab">
                               <div class="form-group col-md-12">
                                    <label for="lifeStyle_title_name">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="lifeStyle_title_name">
                                    @if($errors->has('lifeStyle_title_name'))
                                        <span class="text-danger">{{ $errors->first('lifeStyle_title_name') }}</span>
                                    @endif
                                </div>
                                <!-- <div class="form-group col-md-12">
                                    <label for="lifeStyleLogo">Logo Image</label>
                                    <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="lifeStyle_logo" style="padding: 6px" multiple>
                                    @if($errors->has('lifeStyleLogo'))
                                        <span class="text-danger">{{ $errors->first('lifeStyleLogo') }}</span>
                                    @endif
                                </div> -->
                                <div class="form-group col-md-12">
                                    <label for="lifeStyleDescription">Description</label>
                                    <textarea class="form-control" rows="6" id="lifeStyleDescription" name="lifeStyle_description"></textarea>
                                    <script>
                                        CKEditorChange('lifeStyleDescription','myconfigText.js');
                                    </script>
                                    @if($errors->has('lifeStyleDescription'))
                                        <span class="text-danger">{{ $errors->first('lifeStyleDescription') }}</span>
                                    @endif
                                </div>
                                <!-- <div class="form-group col-md-12">
                                    <label for="lifeStyleSliderImages">Slider Images</label>
                                    <input type="file" class="form-control fileInput4" accept=".jpg,.png,.jpeg" name="lifeStyle_slider_images[]" style="padding: 6px" multiple>
                                    @if($errors->has('lifeStyleSliderImages'))
                                        <span class="text-danger">{{ $errors->first('lifeStyleSliderImages') }}</span>
                                    @endif
                                </div> -->
                                <div class="form-group col-md-12">
                                    <label for="lifeStyle_slider_images">Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="lifeStyle_slider_images" style="padding: 6px" required id="design_gallery_images">
                                    @if($errors->has('lifeStyle_slider_images'))
                                        <span class="text-danger">{{ $errors->first('lifeStyle_slider_images') }}</span>
                                    @endif
                                </div>

                                
                                <div class="col-md-12 addMoreLifestyleTabsFields">
                                    <!-- <div class="row">
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Tab Name" name="lifestyle_tab_name[]">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Title" name="lifestyle_tab_title_name[]">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="6" id="lifestyleDescription_0" name="lifestyle_tab_description[]" placeholder="Description"></textarea>
                                                <script>
                                                    CKEditorChange('lifestyleDescription_0','myconfigText.js');
                                                </script>
                                            </div>
                                            <div class="form-group">
                                                <label for="lifestyle_gallery_tab_images">Image </label>
                                                <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="lifestyle_gallery_tab_images[]" style="padding: 6px" id="lifestyle_gallery_tab_images">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="javascript:0;" class="btn btn-success lifestyleTabAddmoreBtn"> + </a>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="col-md-12"><a href="javascript:0;" class="btn btn-success lifestyleTabAddmoreBtn"> Add tab </a></div>
                               
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Gallery</h5>
                        </div>
                        <div class="card-body">
                            <div class="row galleryTab">
                               <div class="form-group col-md-12">
                                    <label for="TitleName">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="gallery_title_name">
                                    @if($errors->has('TitleName'))
                                        <span class="text-danger">{{ $errors->first('TitleName') }}</span>
                                    @endif
                                </div>
                            
                                <div class="form-group col-md-12">
                                    <label for="galleryDescription">Description</label>
                                    <textarea class="form-control" rows="4" id="galleryDescription" name="gallery_description"></textarea>
                                    @if($errors->has('galleryDescription'))
                                        <span class="text-danger">{{ $errors->first('galleryDescription') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="lifeStyleSliderImages">Gallery Images</label>
                                    <input type="file" class="form-control fileInput4" accept=".jpg,.png,.jpeg" name="gallery_slider_images[]" style="padding: 6px" multiple>
                                    @if($errors->has('lifeStyleSliderImages'))
                                        <span class="text-danger">{{ $errors->first('lifeStyleSliderImages') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Enquire</h5>
                        </div>
                        <div class="card-body">
                            <div class="row enquireTab">
                               <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="enquireThemeColor">Theme Color <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="enquire_theme_color">
                                                <option value="">Select Theme Color</option>
                                                @foreach($theme as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="enquireTextAlignment">Text Alignment <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="enquire_text_alignment">
                                                <option value="">Select Text Alignment</option>
                                                @foreach($textAlignments as $value)
                                                    <option value="{{$value}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                               <div class="form-group col-md-12">
                                    <label for="enquireBackgroundImage">Background Picture</label>
                                    <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="enquire_background_image" style="padding: 6px">
                                    @if($errors->has('enquireBackgroundImage'))
                                        <span class="text-danger">{{ $errors->first('enquireBackgroundImage') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Virtual Tour</h5>
                        </div>
                        <div class="card-body">
                            <div class="row vitualTourTab">
                                <div class="col-md-12 vitualTourBox">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" name="vitual_tour_title[]" required placeholder="Title">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="url" class="form-control" name="vitual_tour_url[]" required placeholder="Link">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="javascript:0;" class="btn btn-success vitualTourAddMore"> + </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Floor Plan <small>(upload only pdf files)</small></h5>
                        </div>
                        <div class="card-body">
                            <div class="row floorPlanTab">
                                <div class="col-md-12 floorPlanTabFields">
                                    <div class="row">
                                        <div class="form-group col-md-11">
                                            <input type="file" class="form-control" style="padding: 6px" name="floorplan_file[]" accept=".pdf">
                                        </div>
                                        <div class="col-md-1">
                                            <a href="javascript:0;" class="btn btn-success floorPlanTabAddmoreBtn"> + </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Brochure <small>(upload only pdf file)</small></h5>
                        </div>
                        <div class="card-body">
                            <div class="row enquiryBox">
                                <div class="form-group col-md-12">
                                    <input type="file" class="form-control" style="padding: 6px" name="brochure_file" accept=".pdf">
                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <input type="submit" value="Save" class="btn btn-success pull-left">
                </div>

            </form>
        </div>
    </div>
<script>

    function addDynamicFieldsProject(addButtonClass, fieldWrapper, numFields, fieldHTML, removeButtonClass){
        var maxField = numFields; //Input fields increment limitation
        var addButton = $(addButtonClass); //Add button selector
        var wrapper = $(fieldWrapper); //Input field wrapper

        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if((x < maxField) && maxField != 0){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }else{
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', removeButtonClass, function(e){
            e.preventDefault();
            $(this).parent().parent().remove(); //Remove field html
            //x--; //Decrement field counter
        });
    }
    var vitualTourAddFields  =  '<div class="row"><div class="col-md-11"><div class="row"><div class="form-group col-md-12"><input type="text" class="form-control" name="vitual_tour_title[]" required placeholder="Title"></div><div class="form-group col-md-12"><input type="url" class="form-control" name="vitual_tour_url[]" required placeholder="Link"></div></div></div><div class="col-md-1"><a href="javascript:0;" class="btn btn-success vitualTourRemove"> - </a></div></div>';
    addDynamicFieldsProject('.vitualTourAddMore', '.vitualTourBox', 5, vitualTourAddFields, '.vitualTourRemove');

    var amtFtsFieldsSet = '<div class="row"><div class="col-md-11"><div class="row"><div class="form-group col-md-12"><input type="text" class="form-control" name="amenities_facilities_amenities[]" placeholder="Amenity Name"></div></div></div><div class="col-md-1"><a href="javascript:0;" class="btn btn-success amtFtsRemove"> - </a></div></div>';
    addDynamicFieldsProject('.amtFtsAddMore', '.amenitiesTextBox', 0, amtFtsFieldsSet, '.amtFtsRemove');

    var floorPlanFileds = '<div class="row"><div class="form-group col-md-11"><input type="file" class="form-control" style="padding: 6px" name="floorplan_file[]" accept=".pdf"></div><div class="col-md-1"><a href="javascript:0;" class="btn btn-success floorPlanTabRemoveBtn"> - </a></div></div>';
    addDynamicFieldsProject('.floorPlanTabAddmoreBtn', '.floorPlanTabFields', 0, floorPlanFileds, '.floorPlanTabRemoveBtn');

    var lifestylemaxField = 0; //Input fields increment limitation
    var lifestyleaddButton = $('.lifestyleTabAddmoreBtn'); //Add button selector
    var lifestylewrapper = $('.addMoreLifestyleTabsFields'); //Input field wrapper
    var tabx = 1;
    function lifestyleTabsFields(tabx){
        var lifestyleFieldHTML = '<div class="row mt-3"><div class="col-md-11"><div class="form-group"><input type="text" class="form-control" placeholder="Tab Name" name="lifestyle_tab_name[]"></div><div class="form-group"><input type="text" class="form-control" placeholder="Title" name="lifestyle_tab_title_name[]"></div><div class="form-group"><textarea class="form-control" rows="6" id="lifestyleDescription_0'+tabx+'" name="lifestyle_tab_description[]" placeholder="Description"></textarea></div><div class="form-group"><label for="lifestyle_gallery_tab_images">Image <span class="text-danger">*</span></label><input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="lifestyle_gallery_tab_images[]" style="padding: 6px" required id="lifestyle_gallery_tab_images"></div></div><div class="col-md-1"><a href="javascript:0;" class="btn btn-success lifestyleTabRemoveBtn"> - </a></div></div>'; //New input field html
        return lifestyleFieldHTML;
    }
    //Once add button is clicked
    $(lifestyleaddButton).click(function(){
        //Check maximum number of input fields
        //if(x < maxField){ 
            tabx++; //Increment field counter
            var dhtml = lifestyleTabsFields(tabx);
            $(lifestylewrapper).append(dhtml); //Add field html
            CKEditorChange('lifestyleDescription_0'+tabx,'myconfigText.js');
        //}
    });
    
    //Once remove button is clicked
    $(lifestylewrapper).on('click', '.lifestyleTabRemoveBtn', function(e){
        e.preventDefault();
        $(this).parent().parent().remove(); //Remove field html
        tabx--; //Decrement field counter
    });
    //addDynamicFieldsProject('.lifestyleTabAddmoreBtn', '.addMoreLifestyleTabsFields', 0, lifestyleFieldHTML, '.lifestyleTabRemoveBtn');

</script>
@endsection