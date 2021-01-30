@extends('layouts.layout')
@section('page_title','About Company : : Omniyat')
@section('page_content')

    <style>
        #cke_1_contents{
            height: 200px !important;
        }
    </style>
    <!-- <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">About Company</h4>
            </div>
        </div>
    </div> -->
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-3">
                    @if(isset($about) && isset($about->id))
                        @include('about.about_edit')
                    @else
                        @include('about.about_add')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection