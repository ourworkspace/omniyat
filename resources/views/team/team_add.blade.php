<div class="d-flex card">
    <div class="card-header">
        <h5 class="card-title">Add Team</h5>
    </div>
    <div class="card-body">
        <form class="row" action="{{route('team.save')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <div class="form-group col-md-4">
                <label>Name <span class="text-danger">*</span></label>
                <input type="text" required name="name" class="form-control">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label>Designation <span class="text-danger">*</span></label>
                <input type="text" required name="designation" class="form-control">
                @if($errors->has('designation'))
                    <span class="text-danger">{{ $errors->first('designation') }}</span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label>Image <span class="text-danger">*</span></label>
                <input type="file" required name="image" style="padding: 6px" class="form-control">
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Description </label>
                <textarea class="form-control" name="description" rows="4"></textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <input type="submit" value="Save" class="btn btn-success">
            </div>
        </form>
    </div>
</div>