<div class="d-flex card">
    <div class="card-header">
        <h5 class="card-title">Partners & Brands List</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped customDataTables">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($partnerBrands as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td align="center">
                            @if(isset($value->image) && file_exists($value->image))
                                <img src="{{asset($value->image)}}" class="img-circle">
                            @endif
                        </td>
                        <td>
                            @php
                                $categoryData = DB::table('partners_brands_categories')->where('id', $value->category_id)->first();
                            @endphp
                            {{$categoryData->name}}
                        </td>
                        <td>{{$value->name}}</td>
                        <td align="center">
                            <span>
                                <a href="{{route('partners.brands.edit',['partnerBrand_id'=>$value->id])}}"> <i class="fa fa-edit fa-1x"></i> </a>
                            </span>
                            <span>
                                <a href="{{route('partners.brands.delete',['partnerBrand_id'=>$value->id])}}" onclick="return confirm('Do you want to delete category?')"> <i class="fa fa-trash-o fa-1x"></i> </a>
                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>