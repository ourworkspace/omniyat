<div class="d-flex card">
    <div class="card-header">
        <h5 class="card-title">Add Philosophy</h5>
    </div>
    <div class="card-body">
        <form action="{{route('philosophy.company.save')}}" enctype="multipart/form-data" class="row" method="post">
            {{csrf_field()}}

            <!-- <div class="form-group col-md-12">
                <label for="titleName">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="titleName" required>
                @if($errors->has('titleName'))
                    <span class="text-danger">{{ $errors->first('titleName') }}</span>
                @endif
            </div> -->
            <div class="form-group col-md-12">
                <label for="sub_title">Page Sub Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="sub_title" value="{{$about->sub_title}}" required>
                @if($errors->has('sub_title'))
                    <span class="text-danger">{{ $errors->first('sub_title') }}</span>
                @endif
            </div>
            &nbsp;&nbsp;&nbsp;<h4>Section 1</h4>
            <div class="form-group col-md-12">
                <label for="image_1">Image </label>
                <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="image_1" style="padding: 6px">
                @if($errors->has('image_1'))
                    <span class="text-danger">{{ $errors->first('image_1') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label for="description_1">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="6" required name="description_1"></textarea>
                <script>
                    CKEditorChange('description_1','myconfigText.js');
                </script>
                @if($errors->has('description_1'))
                    <span class="text-danger">{{ $errors->first('description_1') }}</span>
                @endif
            </div>
            &nbsp;&nbsp;&nbsp;<h4>Section 2</h4>
            <div class="form-group col-md-12">
                <label for="image_2_1">Image 1</label>
                <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="image_2_1" style="padding: 6px">
                @if($errors->has('image_2_1'))
                    <span class="text-danger">{{ $errors->first('image_2_1') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label for="description_2">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="6" required name="description_2"></textarea>
                <script>
                    CKEditorChange('description_2','myconfigText.js');
                </script>
                @if($errors->has('description_2'))
                    <span class="text-danger">{{ $errors->first('description_2') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label for="image_2_2">Image 2</label>
                <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="image_2_2" style="padding: 6px">
                @if($errors->has('image_2_2'))
                    <span class="text-danger">{{ $errors->first('image_2_2') }}</span>
                @endif
            </div>
            &nbsp;&nbsp;&nbsp;<h4>Section 3</h4>
            <div class="form-group col-md-12">
                <label>Title <span class="text-danger">*</span></label>
                <input type="text" required name="title_3" class="form-control">
                @if($errors->has('title_3'))
                    <span class="text-danger">{{ $errors->first('title_3') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label for="description_3">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="6" required name="description_3"></textarea>
                <script>
                    CKEditorChange('description_3','myconfigText.js');
                </script>
                @if($errors->has('description_3'))
                    <span class="text-danger">{{ $errors->first('description_3') }}</span>
                @endif
            </div>
            &nbsp;&nbsp;&nbsp;<h4>Section 4</h4>
            <div class="form-group col-md-12">
                <label>Text Line 1<span class="text-danger">*</span></label>
                <input type="text" required name="title_4_1" class="form-control">
                @if($errors->has('title_4_1'))
                    <span class="text-danger">{{ $errors->first('title_4_1') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Text Line 2<span class="text-danger">*</span></label>
                <input type="text" required name="title_4_2" class="form-control">
                @if($errors->has('title_4_2'))
                    <span class="text-danger">{{ $errors->first('title_4_2') }}</span>
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