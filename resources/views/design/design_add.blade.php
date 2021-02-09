@if(isset($architecture) && isset($architecture->design_type))
    <div class="col-md-12">
        <form action="{{route('design.update')}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <input type="hidden" name="designType" value="architecture">
            <input type="hidden" name="editId" value="{{$architecture->id}}">
            <div class="d-flex card">
                <div class="card-body">
                    <div class="row">
                        <h6 class="col-md-12">Edit Architecture</h6>
                        <div class="form-group col-md-12">
                            <label for="titleName">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{$architecture->title}}" name="titleName" required>
                            @if($errors->has('titleName'))
                                <span class="text-danger">{{ $errors->first('titleName') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="6" name="description">{{$architecture->summary}}</textarea>
                            <script>
                                //CKEditorChange('description','myconfigText.js');
                            </script>
                            @if($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <input type="submit" value="Update" class="btn btn-success pull-left">
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@else
    <div class="col-md-12">
        <form action="{{route('design.save')}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <input type="hidden" name="designType" value="architecture">
            <div class="d-flex card">
                <div class="card-body">
                    <div class="row">
                        <h6 class="col-md-12">Architecture</h6>
                        <div class="form-group col-md-12">
                            <label for="titleName">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="titleName" required>
                            @if($errors->has('titleName'))
                                <span class="text-danger">{{ $errors->first('titleName') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="6" name="description"></textarea>
                            <script>
                                //CKEditorChange('description','myconfigText.js');
                            </script>
                            @if($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <input type="submit" value="Save" class="btn btn-success pull-left">
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endif

@if(isset($interior) && isset($interior->id))
    <div class="col-md-12 mt-4">
        <form action="{{route('design.update')}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <input type="hidden" name="designType" value="interior">
            <input type="hidden" name="editId" value="{{$interior->id}}">
            <div class="d-flex card">
                <div class="card-body">
                    <div class="row">
                        <h6 class="col-md-12">Edit Interior</h6>
                        <div class="form-group col-md-12">
                            <label for="titleName">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{$interior->title}}" name="titleName" required>
                            @if($errors->has('titleName'))
                                <span class="text-danger">{{ $errors->first('titleName') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="6" name="description">{{$interior->summary}}</textarea>
                            <script>
                                //CKEditorChange('description','myconfigText.js');
                            </script>
                            @if($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <input type="submit" value="Update" class="btn btn-success pull-left">
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@else
    <div class="col-md-12 mt-4">
        <form action="{{route('design.save')}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <input type="hidden" name="designType" value="interior">
            <div class="d-flex card">
                <div class="card-body">
                    <div class="row">
                        <h6 class="col-md-12">Interior</h6>
                        <div class="form-group col-md-12">
                            <label for="titleName">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="titleName" required>
                            @if($errors->has('titleName'))
                                <span class="text-danger">{{ $errors->first('titleName') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="6" name="description"></textarea>
                            <script>
                                //CKEditorChange('description','myconfigText.js');
                            </script>
                            @if($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <input type="submit" value="Save" class="btn btn-success pull-left">
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endif

@include('design.design_sliders')