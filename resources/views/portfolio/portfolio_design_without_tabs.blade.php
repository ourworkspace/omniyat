@if(isset($portfolio_design))
<div class="row">
    <div class="form-group col-md-12">
        <label for="designTitleName">Title</label>
        <input type="text" class="form-control" value="{{$portfolio_design->title}}" name="design_title_name_s">
        @if($errors->has('designTitleName'))
            <span class="text-danger">{{ $errors->first('designTitleName') }}</span>
        @endif
    </div>
    <div class="form-group col-md-12">
        <label for="Description">Description</label>
        <textarea class="form-control" rows="6" id="design_description_s" name="design_description_s">{{$portfolio_design->description_1}}</textarea>
        <script>
            CKEditorChange('design_description_s','myconfigText.js');
        </script>
        @if($errors->has('design_description_s'))
            <span class="text-danger">{{ $errors->first('design_description_s') }}</span>
        @endif
    </div>
    <div class="form-group col-md-12">
        <div class="row">
            @if(isset($portfolio_design->background_image) && file_exists($portfolio_design->background_image))
                <div class="col-md-11">
                    <label for="design_gallery_images">Image </label>
                    <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="design_gallery_images" style="padding: 6px">
                    @if($errors->has('design_gallery_images'))
                        <span class="text-danger">{{ $errors->first('design_gallery_images') }}</span>
                    @endif
                </div>
                <div class="col-md-1" style="padding-top: 5px;">
                    <a href="{{asset($portfolio_design->background_image)}}" target="_blank">
                        <img src="{{asset($portfolio_design->background_image)}}"  style="width:100%;height:50px"/>
                    </a>
                </div>
            @else
                <div class="col-md-12">
                    <label for="design_gallery_images">Image  <span class="text-danger">*</span></label>
                    <input type="file" class="form-control filer_plugin_single" required accept=".jpg,.png,.jpeg" name="design_gallery_images" style="padding: 6px">
                    @if($errors->has('design_gallery_images'))
                        <span class="text-danger">{{ $errors->first('design_gallery_images') }}</span>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
@else
    <div class="row">
        <div class="form-group col-md-12">
            <label for="designTitleName">Title</label>
            <input type="text" class="form-control" name="design_title_name_s">
            @if($errors->has('designTitleName'))
                <span class="text-danger">{{ $errors->first('designTitleName') }}</span>
            @endif
        </div>
        <div class="form-group col-md-12">
            <label for="Description">Description</label>
            <textarea class="form-control" rows="6" id="design_description_s" name="design_description_s"></textarea>
            <script>
                CKEditorChange('design_description_s','myconfigText.js');
            </script>
            @if($errors->has('design_description_s'))
                <span class="text-danger">{{ $errors->first('design_description_s') }}</span>
            @endif
        </div>
        <div class="form-group col-md-12">
            <label for="design_gallery_images">Image <span class="text-danger">*</span></label>
            <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="design_gallery_images" style="padding: 6px" required id="design_gallery_images">
            @if($errors->has('design_gallery_images'))
                <span class="text-danger">{{ $errors->first('design_gallery_images') }}</span>
            @endif
        </div>
    </div>
@endif