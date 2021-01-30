@extends('layouts.layout')
@section('page_title','Gallery : : Omniyat')
@section('page_content')
    <style>
        #cke_1_contents{
            height: 200px !important;
        }
    </style>
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Gallery</h4>
            </div>
        </div>
    </div>
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                @include('gallery.gallery_add')
            </div>
        </div>
    </div>
@endsection