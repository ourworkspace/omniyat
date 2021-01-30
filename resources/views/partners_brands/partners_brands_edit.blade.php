<div class="col-lg-5 col-md-5 mb-3">
    <div class="d-flex card">
        <div class="card-header">
            <h5 class="card-title">Edit Partners & Brands</h5>
        </div>
        <div class="card-body">
            <form action="{{route('partners.brands.update')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" value="{{$partnerBrand->id}}" name="partnerBrandId">
                <div class="form-group">
                    <label for="categoryName">Category <span class="text-danger">*</span></label>
                    <select name="category_id" required class="form-control">
                        <option value="">Select Category</option>
                        @foreach($categories as $value)
                            <option value="{{$value->id}}" {{ (isset($partnerBrand->id) && $partnerBrand->category_id == $value->id) ? 'selected' : '' }}  >{{$value->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('category_id'))
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="categoryName">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{$partnerBrand->name}}" name="name" required>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    @if(isset($partnerBrand->image) && file_exists($partnerBrand->image))
                        <label>Brand Image </label> <a href="{{asset($partnerBrand->image)}}" target="_blank" class="pull-right">View Image</a>
                        <input type="file" name="image" accept=".jpg,.jpeg,.png" style="padding: 6px" class="form-control">
                    @else
                        <label>Brand Image <span class="text-danger">*</span></label>
                        <input type="file" required accept=".jpg,.jpeg,.png" name="image" style="padding: 6px" class="form-control">
                    @endif

                    @if($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-success pull-left">
                </div>
            </form>
        </div>
    </div>
</div>