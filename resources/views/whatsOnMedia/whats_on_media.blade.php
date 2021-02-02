@extends('layouts.layout')
@section('page_title','WhatsNew : : Omniyat')
@section('page_content')
    <style>
        /*#cke_1_contents{
            height: 200px !important;
        }*/
        label.error{
            color: red !important;
        }
    </style>
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">WhatsOnMedia</h4>
            </div>
        </div>
    </div>
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin mb-3">
            @if(isset($WhatsOnMedia) && isset($WhatsOnMedia->id))
                @include('whatsOnMedia.whats_on_media_edit')
            @else 
                @include('whatsOnMedia.whats_on_media_add')
            @endif          
        </div>
    </div>
@endsection