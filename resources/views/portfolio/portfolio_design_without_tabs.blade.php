<!--<script src="{{asset('public/assets/vendors/jquery/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('public/assets/vendors/ckeditor/ckeditor.js')}}"></script>
<script>
    function CKEditorChange(name,fileName) {
        CKEDITOR.replace(name,{
            customConfig: fileName,
        });
    }
</script>-->
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
    </div>
@endif