@extends('layouts.layout')
@section('page_title','Philosophy Company : : Omniyat')
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
                    @if(isset($philosophy) && isset($philosophy->id))
                        @include('philosophy.philosophy_edit')
                    @else
                        @include('philosophy.philosophy_add')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection