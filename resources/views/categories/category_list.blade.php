<div class="d-flex card">
    <div class="card-header">
        <h5 class="card-title">Categories List</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped customDataTables">
                <thead>
                <tr>
                    <th>#</th>
                    <th width="60">Image</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td align="center">
                            @if(isset($value->image) && file_exists($value->image))
                                <img src="{{asset($value->image)}}" class="img-circle">
                            @endif
                        </td>
                        <td>{{$value->name}}</td>
                        <td align="center">
                            <span>
                                <a href="{{route('edit.category',['category_id'=>$value->id])}}"> <i class="fa fa-edit fa-1x"></i> </a>
                            </span>
                            <span>
                                <a href="{{route('categories.delete',['category_id'=>$value->id])}}" onclick="return confirm('Do you want to delete category?')"> <i class="fa fa-trash-o fa-1x"></i> </a>
                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>