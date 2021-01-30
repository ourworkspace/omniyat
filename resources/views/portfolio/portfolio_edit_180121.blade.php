@extends('layouts.layout')
@section('page_title','Portfolio : : Omniyat')
@section('page_content')
    <?php
        $textAlignments = ['left-top','left-middle','left-bottom','center-top','center-middle','center-bottom','right-top','right-middle','right-bottom'];
    ?>
    <style>
        #cke_1_contents{
            height: 200px !important;
        }
    </style>
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Edit Portfolio</h4>
            </div>
        </div>
    </div>
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <form action="{{route('portfolio.update')}}" enctype="multipart/form-data" class="row" method="post">
                {{csrf_field()}}
                <input type="hidden" value="{{$portfolio->id}}" name="portfolio_id">
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Edit Portfolio</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="ProjectName">Select Category <span class="text-danger">*</span></label>
                                    <select class="form-control" name="portfolio_category" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $value)
                                            <option value="{{$value->id}}" {{ ($portfolio->category_id == $value->id) ? 'selected' : '' }}>{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('category'))
                                        <span class="text-danger">{{ $errors->first('category') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ProjectName">Project Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{$portfolio->project_name}}" name="portfolio_project_name" required>
                                    @if($errors->has('ProjectName'))
                                        <span class="text-danger">{{ $errors->first('ProjectName') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="TitleName">Title </label>
                                    <input type="text" class="form-control" value="{{$portfolio->title}}" name="portfolio_title_name">
                                    @if($errors->has('TitleName'))
                                        <span class="text-danger">{{ $errors->first('TitleName') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="row">
                                        @if(isset($portfolio->image) && file_exists($portfolio->image))
                                            <div class="col-md-10">
                                                <label for="portfolio_project_image">Background Picture </label>
                                                <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="portfolio_project_image" style="padding: 6px">
                                                @if($errors->has('portfolio_project_image'))
                                                    <span class="text-danger">{{ $errors->first('portfolio_project_image') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{asset($portfolio->image)}}" target="_blank">
                                                    <img src="{{asset($portfolio->image)}}"  style="width:100%;height:50px"/>
                                                </a>
                                            </div>
                                        @else
                                            <div class="col-md-12">
                                                <label for="portfolio_project_image">Background Picture <span class="text-danger">*</span></label>
                                                <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="portfolio_project_image" required style="padding: 6px">
                                                @if($errors->has('portfolio_project_image'))
                                                    <span class="text-danger">{{ $errors->first('portfolio_project_image') }}</span>
                                                @endif
                                            </div>
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="row">
                                        @if(isset($portfolio->logo) && file_exists($portfolio->logo))
                                            <div class="col-md-10">
                                                <label for="Logo">Logo </label>
                                                <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="portfolio_project_logo" style="padding: 6px">
                                                @if($errors->has('Logo'))
                                                    <span class="text-danger">{{ $errors->first('Logo') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-2 pt-2 pl-0">
                                                <a href="{{asset($portfolio->logo)}}" target="_blank">
                                                    <img src="{{asset($portfolio->logo)}}"  style="width:100%;height:50px"/>
                                                </a>
                                            </div>
                                        @else
                                            <div class="col-md-12">
                                                <label for="Logo">Logo </label>
                                                <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="portfolio_project_logo" style="padding: 6px">
                                                @if($errors->has('Logo'))
                                                    <span class="text-danger">{{ $errors->first('Logo') }}</span>
                                                @endif
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
                        <div class="card-header">
                            <h5 class="card-title">About</h5>
                        </div>
                        <div class="card-body">
                            <div class="row aboutTab">
                                <input type="hidden" value="{{$about->id}}" name="about_id">
                               <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="aboutThemeColor">Theme Color <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="about_theme_color">
                                                <option value="">Select Theme Color</option>
                                                <option value="dark" {{($about->theme_color == 'dark')?'selected' :''}} >Dark Theme</option>
                                                <option value="light" {{($about->theme_color == 'light')?'selected' :''}}>Light Theme</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="row">
                                                @if(isset($about->background_image) && file_exists($about->background_image))
                                                    <div class="col-md-10">
                                                        <label for="about_background_picture">Background Picture</label>
                                                        <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="about_background_picture" style="padding: 6px">
                                                        @if($errors->has('about_background_picture'))
                                                            <span class="text-danger">{{ $errors->first('about_background_picture') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="{{asset($about->background_image)}}" target="_blank">
                                                            <img src="{{asset($about->background_image)}}"  style="width:100%;height:50px"/>
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="col-md-12">
                                                        <label for="about_background_picture">Background Picture <span class="text-danger">*</span></label>
                                                        <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="about_background_picture" required style="padding: 6px">
                                                        @if($errors->has('about_background_picture'))
                                                            <span class="text-danger">{{ $errors->first('about_background_picture') }}</span>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="background_position">Background Position <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="background_position">
                                                <option value="">Select Background Position </option>
                                                <option value="left-bottom" {{($about->background_position == 'left-bottom')?'selected' :''}} >left-bottom</option>
                                                <option value="right-bottom" {{($about->background_position == 'right-bottom')?'selected' :''}}>right-bottom</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="background_width">Background Width </label>
                                            <select class="form-control" name="background_width">
                                                <option value="">Select Background Width</option>
                                                <option value="contain-width" {{($about->background_width == 'contain-width')?'selected' :''}} >contain-width</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">    
                                        <div class="form-group col-md-6">
                                            <label for="container_placement">Container Placement <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="container_placement">
                                                <option value="">Select Container Placement</option>
                                                <option value="container-vertical-middle" {{($about->container_placement == 'container-vertical-middle')?'selected' :''}} >container-vertical-middle</option>
                                                <option value="container-vertical-left-top" {{($about->container_placement == 'container-vertical-left-top')?'selected' :''}} >container-vertical-left-top</option>
                                                <option value="container-vertical-left-bottom" {{($about->container_placement == 'container-vertical-left-bottom')?'selected' :''}} >container-vertical-left-bottom</option>
                                                <option value="container-vertical-left-middle" {{($about->container_placement == 'container-vertical-left-middle')?'selected' :''}} >container-vertical-left-middle</option>
                                                <option value="container-vertical-right-top" {{($about->container_placement == 'container-vertical-right-top')?'selected' :''}} >container-vertical-right-top</option>
                                                <option value="container-vertical-right-bottom" {{($about->container_placement == 'container-vertical-right-bottom')?'selected' :''}} >container-vertical-right-bottom</option>
                                                <option value="container-vertical-right-middle" {{($about->container_placement == 'container-vertical-right-middle')?'selected' :''}} >container-vertical-right-middle</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="grid_width">Grid Width <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="grid_width">
                                                <option value="">Select Grid width</option>
                                                <option value="col-md-1" {{($about->grid_width == 'col-md-1')?'selected' :''}} >col-md-1</option>
                                                <option value="col-md-2" {{($about->grid_width == 'col-md-2')?'selected' :''}} >col-md-2</option>
                                                <option value="col-md-3" {{($about->grid_width == 'col-md-3')?'selected' :''}} >col-md-3</option>
                                                <option value="col-md-4" {{($about->grid_width == 'col-md-4')?'selected' :''}} >col-md-4</option>
                                                <option value="col-md-5" {{($about->grid_width == 'col-md-5')?'selected' :''}} >col-md-5</option>
                                                <option value="col-md-6" {{($about->grid_width == 'col-md-6')?'selected' :''}} >col-md-6</option>
                                                <option value="col-md-7" {{($about->grid_width == 'col-md-7')?'selected' :''}} >col-md-7</option>
                                                <option value="col-md-8" {{($about->grid_width == 'col-md-8')?'selected' :''}} >col-md-8</option>
                                                <option value="col-md-9" {{($about->grid_width == 'col-md-9')?'selected' :''}} >col-md-9</option>
                                                <option value="col-md-10" {{($about->grid_width == 'col-md-10')?'selected' :''}} >col-md-10</option>
                                                <option value="col-md-11" {{($about->grid_width == 'col-md-11')?'selected' :''}} >col-md-11</option>
                                                <option value="col-md-12" {{($about->grid_width == 'col-md-12')?'selected' :''}} >col-md-12</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">    
                                        <div class="form-group col-md-6">
                                            <label for="grid_alignment">Grid Alignment <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="grid_alignment">
                                                <option value="">Select Grid width</option>
                                                <option value="pull-left" {{($about->grid_alignment == 'pull-left')?'selected' :''}} >pull-left</option>
                                                <option value="pull-right" {{($about->grid_alignment == 'pull-right')?'selected' :''}} >pull-right</option>
                                                <option value="col-centered" {{($about->grid_alignment == 'col-centered')?'selected' :''}} >col-centered</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="TitleName">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{$about->title}}" required name="about_title_name">
                                    @if($errors->has('TitleName'))
                                        <span class="text-danger">{{ $errors->first('TitleName') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <div class="row">
                                        @if(isset($about->logo) && file_exists($about->logo))
                                            <div class="col-md-10">
                                                <label for="Logo">Logo </label>
                                                <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="about_project_logo" style="padding: 6px">
                                                @if($errors->has('Logo'))
                                                    <span class="text-danger">{{ $errors->first('Logo') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-2 pt-2 pl-0">
                                                <a href="{{asset($about->logo)}}" target="_blank">
                                                    <img src="{{asset($about->logo)}}"  style="width:100%;height:50px"/>
                                                </a>
                                            </div>
                                        @else
                                            <div class="col-md-12">
                                                <label for="Logo">Logo </label>
                                                <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="about_project_logo" style="padding: 6px">
                                                @if($errors->has('Logo'))
                                                    <span class="text-danger">{{ $errors->first('Logo') }}</span>
                                                @endif
                                            </div>
                                        @endif
                                    </div>

                                    
                                </div>
                               
                                <div class="form-group col-md-12">
                                    <label for="Description">Description </label>
                                    <textarea class="form-control" rows="6" id="about_description" name="about_description">{{$about->description_1}}</textarea>
                                    <script>
                                        CKEditorChange('about_description','myconfigText.js');
                                    </script>
                                    @if($errors->has('about_description'))
                                        <span class="text-danger">{{ $errors->first('about_description') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Description">Description 2(RERA REGISTRATION NUMBER)</label>
                                    <textarea class="form-control" rows="4" id="about_description_2" name="about_description_2">{{$about->description_2}}</textarea>
                                    <script>
                                        CKEditorChange('about_description_2','myconfigText.js');
                                    </script>
                                    @if($errors->has('about_description_2'))
                                        <span class="text-danger">{{ $errors->first('about_description_2') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="rera_alignment">RERA Alignment <span class="text-danger">*</span></label>
                                    <select class="form-control" required name="rera_alignment">
                                        <option value="">Select Grid width</option>
                                        <option value="pull-right" {{($about->rera_alignment == 'pull-right')?'selected' :''}} >pull-right</option>
                                        <option value="pull-left" {{($about->rera_alignment == 'pull-left')?'selected' :''}} >pull-left</option>
                                    </select>
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
                                <input type="hidden" value="{{$location->id}}" name="location_id">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="locationThemeColor">Theme Color <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="location_theme_color">
                                                <option value="">Select Theme Color</option>
                                                <option value="dark" {{(isset($location->theme_color) && $location->theme_color=='dark')?'selected':''}}>Dark Theme</option>
                                                <option value="light" {{(isset($location->theme_color) && $location->theme_color=='light')?'selected':''}}>Light Theme</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="locationTextAlignment">Text Alignment <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="location_text_alignment">
                                                <option value="">Select Text Alignment</option>
                                                @foreach($textAlignments as $value)
                                                    <option value="{{$value}}" {{($location->text_alignment==$value) ? 'selected':''}}>{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="TitleName">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{$location->title}}" required name="location_title_name">
                                    @if($errors->has('location_title_name'))
                                        <span class="text-danger">{{ $errors->first('location_title_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        @if(isset($location->background_image) && file_exists($location->background_image))
                                            <div class="col-md-11">
                                                <label for="Logo">Background Picture</label>
                                                <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="location_background_picture" style="padding: 6px">
                                                @if($errors->has('location_background_picture'))
                                                    <span class="text-danger">{{ $errors->first('location_background_picture') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-1">
                                                <a href="{{asset($location->background_image)}}" target="_blank">
                                                    <img src="{{asset($location->background_image)}}"  style="width:100%;height:50px"/>
                                                </a>
                                            </div>
                                        @else
                                            <div class="col-md-12">
                                                <label for="Logo">Background Picture <span class="text-danger">*</span></label>
                                                <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="location_background_picture" required style="padding: 6px">
                                                @if($errors->has('location_background_picture'))
                                                    <span class="text-danger">{{ $errors->first('location_background_picture') }}</span>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                               
                                <div class="form-group col-md-12">
                                    <label for="Description">Description</label>
                                    <textarea class="form-control" rows="6" id="location_description" name="location_description">{{$location->description_1}}</textarea>
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
                            @if(count($design) > 0)
                                <?php
                                    $design_type = $design[0]->option_type;
                                    $project_id = $design[0]->portfolio_id;
                                    $design_gallery = DB::table('portfolios_details_gallery')->where(['tab_id'=>$project_id,'type'=>'design_gallery_images'])->get();
                                ?>
                                <div class="row designTab">
                                    <input type="hidden" value="{{$project_id}}" name="design_portfolio_id">
                                    <div class="col-md-12 mb-2">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="customRadio" name="design_tabs_type" value="withTabs" {{($design_type == 'withTabs') ? 'checked' : ''}}>
                                            <label class="custom-control-label pt-1" for="customRadio">With Tabs</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="customRadio2" {{($design_type == 'withOutTabs') ? 'checked' : ''}} name="design_tabs_type" value="withOutTabs">
                                            <label class="custom-control-label pt-1" for="customRadio2">WithOut Tabs</label>
                                        </div>
                                    </div>

                                    <div id="tabContentBox" class="col-md-12"></div>
                                    
                                    <script>
                                        function designTabs(checkedDesignValue){
                                            $.ajax({
                                                type: "GET",
                                                url: "{{url('cms/portfolio/designTabs')}}/"+checkedDesignValue+'?portfolioId={{$portfolio->id}}',
                                                success: function (designFields) {
                                                    $("#tabContentBox").html(designFields);
                                                }
                                            });
                                        }
                                        $(document).ready(function() {
                                            var checkedDesignValue = $("input[name$='design_tabs_type']:checked").val();
                                            //alert(checkedDesignValue);
                                            designTabs(checkedDesignValue)
                                            $("input[name$='design_tabs_type']").click(function() {
                                                var checkedDesignValue = $(this).val();
                                                designTabs(checkedDesignValue);
                                            });
                                        });
                                    </script>

                                    <div class="form-group col-md-12">
                                        <label for="design_gallery_images">Gallery Images</label>
                                        <input type="file" class="form-control fileInput4" accept=".jpg,.png,.jpeg" name="design_gallery_images[]" style="padding: 6px" multiple>
                                        @if($errors->has('design_gallery_images'))
                                            <span class="text-danger">{{ $errors->first('design_gallery_images') }}</span>
                                        @endif
                                    
                                        @if(count($design_gallery) > 0)
                                            <label>Uploaded Gallery Images</label>
                                            <div class="row">
                                                <?php foreach($design_gallery as $key => $image): ?>
                                                    <div class="col-md-3" id="uploadImage_<?=$key?>">
                                                        <img src="<?=asset($image->image)?>" class="img-thumbnail" style="width: 100%;height: 140px;margin:5px 0px">
                                                        <a href="javascript:0;" onClick="deleteImage('uploadImage_<?=$key?>','<?=$image->id?>',<?=$project_id?>);" style="position: absolute;top: 15px;right: 25px;font-size: 20px;color: red;"><i class="fa fa-trash-o"></i></a>
                                                        <input type="hidden" name="uploaded_images[]" value="<?=$image->id?>">
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="row designTab">
                                    <div class="form-group col-md-12">
                                        <label for="design_gallery_images">Gallery Images</label>
                                        <input type="file" class="form-control fileInput4" accept=".jpg,.png,.jpeg" name="design_gallery_images[]" style="padding: 6px" multiple>
                                        @if($errors->has('design_gallery_images'))
                                            <span class="text-danger">{{ $errors->first('design_gallery_images') }}</span>
                                        @endif
                                    </div>
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
                            @endif
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
                                <?php 
                                    $amenities_facilities_id = $amenities_facilities->portfolio_id;
                                    $amenities_facilities_gallery = DB::table('portfolios_details_gallery')->where(['tab_id'=>$project_id,'type'=>'amenities_facilities_gallery_images'])->get();
                                ?>
                                <input type="hidden" value="{{$amenities_facilities->id}}" name="amenities_facilities_id">
                                
                                <div class="form-group col-md-12">
                                    <label for="TitleName">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{$amenities_facilities->title}}" required name="amenities_facilities_title_name">
                                    @if($errors->has('amenities_facilities_title_name'))
                                        <span class="text-danger">{{ $errors->first('amenities_facilities_title_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="Description">Amenities </label>
                                    <div class="amenitiesTextBox">
                                        <?php
                                            $amenities = explode(',',$amenities_facilities->amenities);
                                        ?>
                                        @if(count($amenities) > 0)
                                            @foreach($amenities as $akey => $amenity)
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" value="{{$amenity}}" name="amenities_facilities_amenities[]" placeholder="Amenity Name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        @if($akey == 0)
                                                            <a href="javascript:0;" class="btn btn-success amtFtsAddMore"> + </a>
                                                        @else
                                                            <a href="javascript:0;" class="btn btn-success amtFtsRemove"> - </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <input type="text" class="form-control" name="amenities_facilities_amenities[]" required placeholder="Amenity Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="javascript:0;" class="btn btn-success amtFtsAddMore"> + </a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Description">Description</label>
                                    <textarea class="form-control" rows="6" id="amtFltDescription" name="amenities_facilities_description">{{$amenities_facilities->description_1}}</textarea>
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
                                    @if(count($amenities_facilities_gallery) > 0)
                                        <label>Uploaded Gallery Images</label>
                                        <div class="row">
                                            <?php foreach($amenities_facilities_gallery as $afkey => $amenities_facilities_image): ?>
                                                <div class="col-md-3" id="amenitiesUploadImage_<?=$afkey?>">
                                                    <img src="<?=asset($amenities_facilities_image->image)?>" class="img-thumbnail" style="width: 100%;height: 140px;margin:5px 0px">
                                                    <a href="javascript:0;" onClick="deleteImage('amenitiesUploadImage_<?=$afkey?>','<?=$amenities_facilities_image->id?>',<?=$amenities_facilities_id?>);" style="position: absolute;top: 15px;right: 25px;font-size: 20px;color: red;"><i class="fa fa-trash-o"></i></a>
                                                    <input type="hidden" name="amenities_facilities_uploaded_images[]" value="<?=$amenities_facilities_image->id?>">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
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
                                <?php 
                                    $lifestyle_id = $lifeStyle->portfolio_id;
                                    $lifeStyle_gallery = DB::table('portfolios_details_gallery')->where(['tab_id'=>$lifeStyle->portfolio_id,'type'=>'lifeStyle_slider_images'])->get();
                                ?>
                                <input type="hidden" value="{{$lifeStyle->id}}" name="lifestyle_id">
                                <div class="form-group col-md-12">
                                    <label for="TitleName">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required value="{{$lifeStyle->title}}" name="lifeStyle_title_name">
                                    @if($errors->has('TitleName'))
                                        <span class="text-danger">{{ $errors->first('TitleName') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    <div class="row">
                                        @if(isset($lifeStyle->logo) && file_exists($lifeStyle->logo))
                                            <div class="col-md-11">
                                                <label for="lifeStyleLogo">Logo Image</label>
                                                <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="lifeStyle_logo" style="padding: 6px" multiple>
                                                @if($errors->has('lifeStyleLogo'))
                                                    <span class="text-danger">{{ $errors->first('lifeStyleLogo') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-1">
                                                <a href="{{asset($lifeStyle->logo)}}" target="_blank">
                                                    <img src="{{asset($lifeStyle->logo)}}"  style="width:100%;height:50px"/>
                                                </a>
                                            </div>
                                        @else 
                                            <div class="col-md-12">
                                                <label for="lifeStyleLogo">Logo Image</label>
                                                <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="lifeStyle_logo" style="padding: 6px" multiple>
                                                @if($errors->has('lifeStyleLogo'))
                                                    <span class="text-danger">{{ $errors->first('lifeStyleLogo') }}</span>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                               
                            
                                <div class="form-group col-md-12">
                                    <label for="lifeStyleDescription">Description</label>
                                    <textarea class="form-control" rows="6" id="lifeStyleDescription" name="lifeStyle_description">{{$lifeStyle->description_1}}</textarea>
                                    <script>
                                        CKEditorChange('lifeStyleDescription','myconfigText.js');
                                    </script>
                                    @if($errors->has('lifeStyleDescription'))
                                        <span class="text-danger">{{ $errors->first('lifeStyleDescription') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="lifeStyleSliderImages">Slider Images</label>
                                    <input type="file" class="form-control fileInput4" accept=".jpg,.png,.jpeg" name="lifeStyle_slider_images[]" style="padding: 6px" multiple>
                                    @if(count($lifeStyle_gallery) > 0)
                                        <label>Uploaded Gallery Images</label>
                                        <div class="row">
                                            <?php foreach($lifeStyle_gallery as $afkey => $lifeStyle_gallery_image): ?>
                                                <div class="col-md-3" id="lifeStyleUploadImage_<?=$afkey?>">
                                                    <img src="<?=asset($lifeStyle_gallery_image->image)?>" class="img-thumbnail" style="width: 100%;height: 140px;margin:5px 0px">
                                                    <a href="javascript:0;" onClick="deleteImage('lifeStyleUploadImage_<?=$afkey?>','<?=$lifeStyle_gallery_image->id?>',<?=$lifestyle_id?>);" style="position: absolute;top: 15px;right: 25px;font-size: 20px;color: red;"><i class="fa fa-trash-o"></i></a>
                                                    <input type="hidden" name="lifeStyle_uploaded_images[]" value="<?=$lifeStyle_gallery_image->id?>">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    @endif
                                </div>
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
                            <?php 
                                $gallery_id = $gallery->portfolio_id;
                                $gallery_images = DB::table('portfolios_details_gallery')->where(['tab_id'=>$gallery->portfolio_id,'type'=>'gallery_slider_images'])->get();
                            ?>
                            <div class="row galleryTab">
                                <input type="hidden" value="{{$gallery->id}}" name="gallery_id">
                                <div class="form-group col-md-12">
                                    <label for="TitleName">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required value="{{$gallery->title}}" name="gallery_title_name">
                                    @if($errors->has('TitleName'))
                                        <span class="text-danger">{{ $errors->first('TitleName') }}</span>
                                    @endif
                                </div>
                            
                                <div class="form-group col-md-12">
                                    <label for="galleryDescription">Description</label>
                                    <textarea class="form-control" rows="4" id="galleryDescription" name="gallery_description">{{$gallery->description_1}}</textarea>
                                    @if($errors->has('galleryDescription'))
                                        <span class="text-danger">{{ $errors->first('galleryDescription') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="lifeStyleSliderImages">Gallery Images</label>
                                    <input type="file" class="form-control fileInput4" accept=".jpg,.png,.jpeg" name="gallery_slider_images[]" style="padding: 6px" multiple>
                                    @if(count($gallery_images) > 0)
                                        <label>Uploaded Gallery Images</label>
                                        <div class="row">
                                            <?php foreach($gallery_images as $gkey => $gallery_image): ?>
                                                <div class="col-md-3" id="galleryUploadImage_<?=$gkey?>">
                                                    <img src="<?=asset($gallery_image->image)?>" class="img-thumbnail" style="width: 100%;height: 140px;margin:5px 0px">
                                                    <a href="javascript:0;" onClick="deleteImage('galleryUploadImage_<?=$gkey?>','<?=$gallery_image->id?>',<?=$lifestyle_id?>);" style="position: absolute;top: 15px;right: 25px;font-size: 20px;color: red;"><i class="fa fa-trash-o"></i></a>
                                                    <input type="hidden" name="gallery_uploaded_images[]" value="<?=$gallery_image->id?>">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
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
                                <input type="hidden" value="{{$enquire->id ?? ''}}" name="enquire_id">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="enquireThemeColor">Theme Color <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="enquire_theme_color">
                                                <option value="">Select Theme Color</option>
                                                <option value="dark" {{(isset($enquire->theme_color) && $enquire->theme_color == 'dark')?'selected':''}}>Dark Theme</option>
                                                <option value="light" {{(isset($enquire->theme_color) && $enquire->theme_color == 'light')?'selected':''}}>Light Theme</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="enquireTextAlignment">Text Alignment <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="enquire_text_alignment">
                                                <option value="">Select Text Alignment</option>
                                                @foreach($textAlignments as $value)
                                                    <option value="{{$value}}" {{(isset($enquire->text_alignment) && $enquire->text_alignment == $value)?'selected':''}}>{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                               <div class="form-group col-md-12">
                                    <div class="row">
                                        @if(isset($enquire->background_image) && file_exists($enquire->background_image))
                                            <div class="col-md-11">
                                                <label for="enquireBackgroundImage">Background Picture</label>
                                                <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="enquire_background_image" style="padding: 6px">
                                                @if($errors->has('enquireBackgroundImage'))
                                                    <span class="text-danger">{{ $errors->first('enquireBackgroundImage') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-1">
                                                <a href="{{asset($enquire->background_image)}}" target="_blank">
                                                    <img src="{{asset($enquire->background_image)}}"  style="width:100%;height:50px"/>
                                                </a>
                                            </div>
                                        @else
                                            <div class="col-md-12">
                                                <label for="enquireBackgroundImage">Background Picture</label>
                                                <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="enquire_background_image" style="padding: 6px">
                                                @if($errors->has('enquireBackgroundImage'))
                                                    <span class="text-danger">{{ $errors->first('enquireBackgroundImage') }}</span>
                                                @endif
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
                        <div class="card-header">
                            <h5 class="card-title">Vitual Tour</h5>
                        </div>
                        <div class="card-body">
                            <div class="row vitualTourTab">
                                <div class="col-md-12 vitualTourBox">
                                    @if(count($vitual_tour) > 0)
                                        @foreach($vitual_tour as $vkey => $vrdata)
                                            <div class="row">
                                                <input type="hidden" value="{{$vrdata->id}}" name="vitual_tour_id[]">
                                                <div class="col-md-11">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <input type="text" class="form-control" name="vitual_tour_title[]" value="{{$vrdata->title}}" required placeholder="Title">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <input type="url" class="form-control" name="vitual_tour_url[]" value="{{$vrdata->links}}" required placeholder="Link">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    @if($vkey == 0)
                                                        <a href="javascript:0;" class="btn btn-success vitualTourAddMore"> + </a>
                                                    @else
                                                        <a href="javascript:0;" class="btn btn-success vitualTourRemove"> - </a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
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
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Floor Plan <small>(upload only pdf file)</small></h5>
                        </div>
                        <div class="card-body">
                            <div class="row floorPlanTab">
                                <input type="hidden" value="{{isset($floorplan_file)?$floorplan_file->id:''}}" name="floorplan_file_id">
                                @if(isset($floorplan_file) && file_exists($floorplan_file->links))
                                    <div class="form-group col-md-11">
                                        <input type="file" class="form-control" style="padding: 6px" name="floorplan_file" accept=".pdf">
                                    </div>
                                    <div class="col-md-1">
                                        <a href="{{asset($floorplan_file->links)}}" target="_blank"><i class="fa fa-download" style="font-size: 30px;padding: 5px 10px;"></i></a>
                                    </div>
                                @else
                                    <div class="form-group col-md-12">
                                        <input type="file" class="form-control" style="padding: 6px" name="floorplan_file" accept=".pdf">
                                    </div>
                                @endif
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
                                <input type="hidden" value="{{isset($brochure_file)?$brochure_file->id:''}}" name="brochure_file_id">
                                @if(isset($brochure_file) && file_exists($brochure_file->links))
                                    <div class="form-group col-md-11">
                                        <input type="file" class="form-control" style="padding: 6px" name="brochure_file" accept=".pdf">
                                    </div>
                                    <div class="col-md-1">
                                        <a href="{{asset($brochure_file->links)}}" target="_blank"><i class="fa fa-download" style="font-size: 30px;padding: 5px 10px;"></i></a>
                                    </div>
                                @else
                                    <div class="form-group col-md-12">
                                        <input type="file" class="form-control" style="padding: 6px" name="brochure_file" accept=".pdf">
                                    </div>
                                @endif

                                <div class="form-group col-md-12">
                                    <input type="submit" value="Update" class="btn btn-success pull-left">
                                </div>
                            </div>
                        </div>
                    </div>
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

</script>
<script>
    function deleteImage(divId,galleryId,portfolioId){
        if(confirm('Do you want delete image?')){
            //console.log(divId);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('portfolio.images.delete')}}",
                data: {gallery_image_id:galleryId,portfolioId:portfolioId},
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if(response.res == true){
                        $("#"+divId).remove();
                    }
                }
            });
        }
    }
</script>
@endsection