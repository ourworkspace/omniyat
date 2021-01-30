@extends('layouts.layout')

@section('page_title','Dashboard : : Omniyat')

@section('page_content')

<div class="row page-title-header">

    <div class="col-12">

        <div class="page-header">

            <h4 class="page-title" style="white-space: nowrap;">Dashboard</h4>

        </div>

    </div>

</div> 

 <!-- Page Title Header Ends-->

 <div class="row">
    <!-- Work By Harsha -->
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="d-flex card">
                    <div class="wrapper card-body">
                        <h5 class="mb-0 font-weight-medium text-primary">Portfolio </h5>
                        <h3 class="mb-0 font-weight-semibold">{{count($portfolios)}}</h3>
                        <p class="mb-0 text-muted"><a href="{{route('portfolio.list')}}">Explore →</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="d-flex card">
                    <div class="wrapper card-body">
                        <h5 class="mb-0 font-weight-medium text-primary">What's New </h5>
                        <h3 class="mb-0 font-weight-semibold">{{count($whatsNew)}}</h3>
                        <p class="mb-0 text-muted"><a href="{{route('whatsNew.list')}}">Explore →</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="d-flex card">
                    <div class="wrapper card-body">
                        <h5 class="mb-0 font-weight-medium text-primary">What's on media </h5>
                        <h3 class="mb-0 font-weight-semibold">{{count($WhatsOnMedia)}}</h3>
                        <p class="mb-0 text-muted"><a href="{{route('whatsOnMedia.list')}}">Explore →</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="d-flex card">
                    <div class="wrapper card-body">
                        <h5 class="mb-0 font-weight-medium text-primary">Press Releases </h5>
                        <h3 class="mb-0 font-weight-semibold">{{count($PressRelease)}}</h3>
                        <p class="mb-0 text-muted"><a href="{{route('press.releases.list')}}">Explore →</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="d-flex card">
                    <div class="wrapper card-body">
                        <h5 class="mb-0 font-weight-medium text-primary">Press Kit </h5>
                        <h3 class="mb-0 font-weight-semibold">{{count($PressKit)}}</h3>
                        <p class="mb-0 text-muted"><a href="{{route('press.kit.list')}}">Explore →</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="d-flex card">
                    <div class="wrapper card-body">
                        <h5 class="mb-0 font-weight-medium text-primary">CSR </h5>
                        <h3 class="mb-0 font-weight-semibold">{{count($Csr)}}</h3>
                        <p class="mb-0 text-muted"><a href="{{route('csr.list')}}">Explore →</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="d-flex card">
                    <div class="wrapper card-body">
                        <h5 class="mb-0 font-weight-medium text-primary">Sponsorships </h5>
                        <h3 class="mb-0 font-weight-semibold">{{count($Sponsorships)}}</h3>
                        <p class="mb-0 text-muted"><a href="{{route('sponsorships.list')}}">Explore →</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="d-flex card">
                    <div class="wrapper card-body">
                        <h5 class="mb-0 font-weight-medium text-primary">Leadership </h5>
                        <h3 class="mb-0 font-weight-semibold">{{count($Leadership)}}</h3>
                        <p class="mb-0 text-muted"><a href="{{route('leadership.list')}}">Explore →</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Work By Harsha -->
</div>

@endsection