<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('page_title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="shortcut icon" href="{{asset('public/site/images/ic_fav.png')}}" type="image/x-icon"/>
        <link rel="icon" href="{{asset('public/site/images/ic_fav.png')}}" type="image/x-icon"/>
        @include('layouts.sourceLinksTop')
    </head>
    <body>
        <div class="container-scroller">
            @include('layouts.header')
            <div class="container-fluid page-body-wrapper">
                
                @include('layouts.menu')
                <div class="main-panel">
                    <div class="content-wrapper"> 
                        @include('layouts.alerts')
                        @yield('page_content') 
                    </div>
                    @include('layouts.footer')
                </div>
                
            </div>
        </div>
        @include('layouts.sourceLinksBottom')
    </body>
</html>