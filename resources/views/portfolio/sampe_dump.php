@extends('layouts.layout')
@section('page_title','Portfolio : : Omniyat')
@section('page_content')
    <?php
        $textAlignments = ['Top-Left','Top-Middle','Top-Bottom','Top-Center','Middle-Center','Bottom-Center','Top-Right','MIddle-Right','Bottom-Right'];
    ?>
    <style>
        #cke_1_contents{
            height: 200px !important;
        }
    </style>
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Add Portfolio</h4>
            </div>
        </div>
    </div>
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
                                <div class="form-group col-md-12">
                                    <label for="ProjectName">Select Category <span class="text-danger">*</span></label>
                                    <select class="form-control" name="category" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('category'))
                                        <span class="text-danger">{{ $errors->first('category') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="ProjectName">Project Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="ProjectName" required>
                                    @if($errors->has('ProjectName'))
                                        <span class="text-danger">{{ $errors->first('ProjectName') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="TitleName">Title</label>
                                    <input type="text" class="form-control" name="TitleName">
                                    @if($errors->has('TitleName'))
                                        <span class="text-danger">{{ $errors->first('TitleName') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Logo">Logo </label>
                                    <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="ProjectLogo" style="padding: 6px">
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
                            <h5 class="card-title">Portfolio Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row aboutTab">
                               <h4 class="col-md-12">About</h4>
                               <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="aboutThemeColor">Theme Color <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="aboutThemeColor">
                                                <option value="">Select Theme Color</option>
                                                <option value="dark">Dark Theme</option>
                                                <option value="light">Light Theme</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="aboutTextAlignment">Text Alignment</label>
                                            <select class="form-control" required name="aboutThemeColor">
                                                <option value="">Select Text Alignment</option>
                                                @foreach($textAlignments as $value)
                                                    <option value="{{$value}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                               <div class="form-group col-md-12">
                                    <label for="Logo">Picture</label>
                                    <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="aboutBackgroundPicture" style="padding: 6px">
                                    @if($errors->has('Logo'))
                                        <span class="text-danger">{{ $errors->first('Logo') }}</span>
                                    @endif
                                </div>
                               <div class="form-group col-md-12">
                                    <label for="Logo">Logo </label>
                                    <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="ProjectLogo" style="padding: 6px">
                                    @if($errors->has('Logo'))
                                        <span class="text-danger">{{ $errors->first('Logo') }}</span>
                                    @endif
                                </div>
                               <div class="form-group col-md-12">
                                    <label for="TitleName">Title</label>
                                    <input type="text" class="form-control" name="TitleName">
                                    @if($errors->has('TitleName'))
                                        <span class="text-danger">{{ $errors->first('TitleName') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Description">Description 1</label>
                                    <textarea class="form-control" rows="6" name="aboutDescription1"></textarea>
                                    <script>
                                        CKEditorChange('aboutDescription1','myconfigText.js');
                                    </script>
                                    @if($errors->has('aboutDescription1'))
                                        <span class="text-danger">{{ $errors->first('aboutDescription1') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Description">Description 2</label>
                                    <textarea class="form-control" rows="4" name="aboutDescription2"></textarea>
                                    <script>
                                        CKEditorChange('aboutDescription2','myconfigText.js');
                                    </script>
                                    @if($errors->has('aboutDescription2'))
                                        <span class="text-danger">{{ $errors->first('aboutDescription2') }}</span>
                                    @endif
                                </div>
                                
                            </div>

                            <div class="row locationTab">
                               <h4 class="col-md-12">Location</h4>
                               <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="locationThemeColor">Theme Color <span class="text-danger">*</span></label>
                                            <select class="form-control" required name="locationThemeColor">
                                                <option value="">Select Theme Color</option>
                                                <option value="dark">Dark Theme</option>
                                                <option value="light">Light Theme</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="locationTextAlignment">Text Alignment</label>
                                            <select class="form-control" required name="locationThemeColor">
                                                <option value="">Select Text Alignment</option>
                                                @foreach($textAlignments as $value)
                                                    <option value="{{$value}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                               <div class="form-group col-md-12">
                                    <label for="Logo">Picture</label>
                                    <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="locationBackgroundPicture" style="padding: 6px">
                                    @if($errors->has('locationBackgroundPicture'))
                                        <span class="text-danger">{{ $errors->first('locationBackgroundPicture') }}</span>
                                    @endif
                                </div>
                               <div class="form-group col-md-12">
                                    <label for="TitleName">Title</label>
                                    <input type="text" class="form-control" name="locationTitleName">
                                    @if($errors->has('TitleName'))
                                        <span class="text-danger">{{ $errors->first('TitleName') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Description">Description 1</label>
                                    <textarea class="form-control" rows="6" name="locationDescription1"></textarea>
                                    <script>
                                        CKEditorChange('locationDescription1','myconfigText.js');
                                    </script>
                                    @if($errors->has('locationDescription1'))
                                        <span class="text-danger">{{ $errors->first('locationDescription1') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row designTab">
                               <h4 class="col-md-12">Design</h4>

                                <div class="col-md-12 mb-2">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="customRadio" name="designTabsType" value="withTabs" checked>
                                        <label class="custom-control-label pt-1" for="customRadio">With Tabs</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="customRadio2" name="designTabsType" value="withOutTabs">
                                        <label class="custom-control-label pt-1" for="customRadio2">With OutTabs</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row" id="tabWithTabContentBox" style="display:none">
                                        <div class="col-md-12 addMoreDesignFields">
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <div class="form-group col-md-12">
                                                        <input type="text" class="form-control" placeholder="Tab Name" name="designTabName[]">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <input type="text" class="form-control" placeholder="Title" name="designTitleName[]">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <textarea class="form-control" rows="6" id="designDescription_0" name="designDescription[]" placeholder="Description"></textarea>
                                                        <script>
                                                            CKEditorChange('designDescription_0','myconfigText.js');
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="javascript:0;" class="btn btn-success design_addBtn"> + </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="tabWithOutTabContentBox" style="display:none">
                                        <div class="form-group col-md-12">
                                            <label for="designTitleName">Title</label>
                                            <input type="text" class="form-control" name="designTitleName">
                                            @if($errors->has('designTitleName'))
                                                <span class="text-danger">{{ $errors->first('designTitleName') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="Description">Description 1</label>
                                            <textarea class="form-control" rows="6" name="locationDescription1"></textarea>
                                            <script>
                                                CKEditorChange('locationDescription1','myconfigText.js');
                                            </script>
                                            @if($errors->has('locationDescription1'))
                                                <span class="text-danger">{{ $errors->first('locationDescription1') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
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
                                        var checkedDesignValue = $("input[name$='designTabsType']").val();
                                        if(checkedDesignValue == 'withTabs'){
                                            $("#tabWithTabContentBox").show();
                                            $("#tabWithOutTabContentBox").hide();
                                        }else{
                                            $("#tabWithOutTabContentBox").show();
                                        }
                                        //designTabs(checkedDesignValue)
                                        $("input[name$='designTabsType']").click(function() {
                                            var checkedDesignValue = $(this).val();
                                            if(checkedDesignValue == 'withTabs'){
                                                $("#tabWithTabContentBox").show();
                                                $("#tabWithOutTabContentBox").hide();
                                            }else{
                                                $("#tabWithTabContentBox").hide();
                                                $("#tabWithOutTabContentBox").show();
                                            }
                                            //designTabs(checkedDesignValue);
                                        });
                                    });
                                </script>
                                <script>
                                    var maxField = 4; //Input fields increment limitation
                                    var addButton = $('.design_addBtn'); //Add button selector
                                    var wrapper = $('.addMoreDesignFields'); //Input field wrapper

                                    var x = 1; //Initial field counter is 1
                                    var designFieldHTML = '<div class="row"><div class="col-md-11"><div class="form-group col-md-12"><input type="text" class="form-control" placeholder="Tab Name" name="designTabName[]"></div><div class="form-group col-md-12"><input type="text" class="form-control" placeholder="Title" name="designTitleName[]"></div><div class="form-group col-md-12"><textarea class="form-control" rows="6" id="designDescription'+x+'" name="designDescription[]" placeholder="Description"></textarea></div></div><div class="col-md-1"><a href="javascript:0;" class="btn btn-success design_removeBtn"> - </a></div></div>'; //New input field html

                                    //Once add button is clicked
                                    $(addButton).click(function(){
                                        //Check maximum number of input fields
                                        if(x < maxField){ 
                                            x++; //Increment field counter
                                            $(wrapper).append(designFieldHTML); //Add field html
                                            CKEditorChange("designDescription"+x,"myconfigText.js");
                                        }
                                    });
                                    
                                    //Once remove button is clicked
                                    $(wrapper).on('click', '.design_removeBtn', function(e){
                                        e.preventDefault();
                                        $(this).parent().parent().remove(); //Remove field html
                                        x--; //Decrement field counter
                                    });
                            </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-body">
                            <div class="form-group col-md-12">
                                <input type="submit" value="Save" class="btn btn-success pull-left">
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </form>
        </div>
    </div>
@endsection