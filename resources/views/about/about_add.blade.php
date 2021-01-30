<div class="d-flex card">
    <div class="card-header">
        <h5 class="card-title">Add About Company</h5>
    </div>
    <div class="card-body">
        <form action="{{route('about.company.save')}}" enctype="multipart/form-data" class="row" method="post">
            {{csrf_field()}}

            <div class="form-group col-md-12">
                <label>Page Sub Title <span class="text-danger">*</span></label>
                <input type="text" required name="sub_title" class="form-control">
                @if($errors->has('sub_title'))
                    <span class="text-danger">{{ $errors->first('sub_title') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label for="LogoImage">Image </label>
                <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="LogoImage" style="padding: 6px">
                @if($errors->has('LogoImage'))
                    <span class="text-danger">{{ $errors->first('LogoImage') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Image Text <span class="text-danger">*</span></label>
                <input type="text" required name="image_text" class="form-control">
                @if($errors->has('image_text'))
                    <span class="text-danger">{{ $errors->first('image_text') }}</span>
                @endif
            </div>

            <div class="form-group col-md-12">
                <label for="Description">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="6" required name="description"></textarea>
                <script>
                    CKEditorChange('description','myconfigText.js');
                </script>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Button Text <span class="text-danger">*</span></label>
                <input type="text" required name="button_text" class="form-control">
                @if($errors->has('button_text'))
                    <span class="text-danger">{{ $errors->first('button_text') }}</span>
                @endif
            </div>

            <div class="form-group col-md-12">
                <label>Button URL <span class="text-danger">*</span></label>
                <input type="url" required name="button_url" class="form-control">
                @if($errors->has('button_url'))
                    <span class="text-danger">{{ $errors->first('button_url') }}</span>
                @endif
            </div>

            <div class="form-group col-md-12">
                <input type="submit" value="Save" class="btn btn-success pull-left">
            </div>
        </form>
    </div>
</div>