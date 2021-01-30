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
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($PressReleasesCategories as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->name}}</td>
                        <td align="center">
                            <span>
                                <a href="{{route('press.releases.category.edit',['Id'=>$value->id])}}"> <i class="fa fa-edit fa-1x"></i> </a>
                            </span>
                            <span>
                                <a href="{{route('press.releases.category.delete',['Id'=>$value->id])}}" onclick="return confirm('Do you want to delete category?')"> <i class="fa fa-trash-o fa-1x"></i> </a>
                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>