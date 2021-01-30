<div class="d-flex card">
    <div class="card-header">
        <h5 class="card-title">Edit Team</h5>
    </div>
    <div class="card-body">
        <form class="row" action="{{route('team.update')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <input type="hidden" value="{{$team->id}}" name="team_id">
            <div class="form-group col-md-4">
                <label>Name <span class="text-danger">*</span></label>
                <input type="text" required name="name" value="{{$team->name}}" class="form-control">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label>Designation <span class="text-danger">*</span></label>
                <input type="text" required name="designation" value="{{$team->designation}}" class="form-control">
                @if($errors->has('designation'))
                    <span class="text-danger">{{ $errors->first('designation') }}</span>
                @endif
            </div>
            <div class="form-group col-md-4">
                @if(isset($team->image) && file_exists($team->image))
                    <label>Image </label> <a href="{{asset($team->image)}}" target="_blank" class="pull-right">View Image</a>
                    <input type="file" name="image" style="padding: 6px" class="form-control">
                @else
                    <label>Image <span class="text-danger">*</span></label>
                    <input type="file" required name="image" style="padding: 6px" class="form-control">
                @endif
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Description </label>
                <textarea class="form-control" name="description" rows="4">{{$team->description}}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <input type="submit" value="Update" class="btn btn-success">
            </div>
        </form>
    </div>
</div>