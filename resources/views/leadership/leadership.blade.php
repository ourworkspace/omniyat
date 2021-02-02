@extends('layouts.layout')
@section('page_title','Leadership : : Omniyat')
@section('page_content')
    <style>
        /*#cke_1_contents{
            height: 200px !important;
        }*/
        label.error{
            color: red !important;
        }
    </style>
    <!-- <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Leadership</h4>
            </div>
        </div>
    </div> -->
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin mb-3">
            @if(isset($leadership))
                @include('leadership.leadership_edit')
            @else
                @include('leadership.leadership_add')
            @endif
        </div>
    </div>
@endsection