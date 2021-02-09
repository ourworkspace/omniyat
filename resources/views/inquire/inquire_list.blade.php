@extends('layouts.layout')
@section('page_title','Inquire List : : Omniyat')
@section('page_content')
    
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Inquire List</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dataTables">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($inquireList as $key => $inquire)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$inquire->first_name}}</td>
                                                <td>{{$inquire->last_name}}</td>
                                                <td>{{$inquire->mobile}}</td>
                                                <td>{{$inquire->email}}</td>
                                                <td>{{$inquire->message}}</td>
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

@endsection