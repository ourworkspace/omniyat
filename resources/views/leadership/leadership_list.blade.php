@extends('layouts.layout')
@section('page_title','Leadership List : : Omniyat')
@section('page_content')
    
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Leadership Team
                            <div class="pull-right">
                                <button><a href="{{route('leadership.add')}}" class="btn btn-auto tss-msb px-45 py-15 fs-12">Add Leadership</a></button>
                            </div>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dataTables">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="mysortabledata">
                                        @foreach($leadershipList as $key => $value)
                                            <tr id="{{$value->id}}">
                                                <td width="80">{{$key+1}}</td>
                                                <td width="80">
                                                    @if(isset($value->image) && file_exists($value->image))
                                                        <img src="{{asset($value->image)}}">
                                                    @endif
                                                </td>
                                                <td> {{$value->leadership_name}} </td>
                                                <td> {{$value->leadership_designation}} </td>
                                                <td align="center" width="80">
                                                    <span>
                                                        <a href="{{route('leadership.edit',['leadership'=>$value->id])}}"> <i class="fa fa-edit fa-1x"></i> </a>
                                                    </span>
                                                    <span>
                                                        <a href="{{route('leadership.delete',['leadershipId'=>$value->id])}}" onclick="return confirm('Do you want to delete Leadership?')"> <i class="fa fa-trash-o fa-1x"></i> </a>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            $('.mysortabledata').sortable({
                update:function(){
                    var page_id_array = new Array();
                    $('.mysortabledata tr').each(function (){
                        id = $(this).attr('id');
                        page_id_array.push(id);
                    });
                    //console.log(page_id_array);
                    var url = "{{route('leadership.list.order.update')}}";
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {page_id_array:page_id_array},
                        success: function (response) {
                            console.log(response);
                            //console.log(response.order);
                        }
                    });
                }
            });
        });
    </script>
@endsection