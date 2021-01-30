@extends('layouts.layout')
@section('page_title','Partners & Brands : : Omniyat')
@section('page_content')
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Partners & Brands</h4>
            </div>
        </div>
    </div>
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                @if(isset($partnerBrand) && isset($partnerBrand->id))
                    @include('partners_brands.partners_brands_edit')
                @else
                    @include('partners_brands.partners_brands_add')
                @endif
                <div class="col-lg-7 col-md-7 mb-3">
                    @include('partners_brands.partners_brands_list')
                </div>
            </div>
        </div>
    </div>
@endsection