<div class="col-lg-5 col-md-5 mb-3">
    <div class="d-flex card">
        <div class="card-header">
            <h5 class="card-title">Add Partners & Brands</h5>
        </div>
        <div class="card-body">
            <form action="{{route('partners.brands.save')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="categoryName">Category <span class="text-danger">*</span></label>
                    <select name="category_id" required class="form-control">
                        <option value="">Select Category</option>
                        @foreach($categories as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="categoryName">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" required>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="image">Brand Image <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" style="padding: 6px" name="image" accept=".jpg,.jpeg,.png" required="required"/>
                    @if($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <input type="submit" value="Save" class="btn btn-success pull-left">
                </div>
            </form>
        </div>
    </div>
</div>