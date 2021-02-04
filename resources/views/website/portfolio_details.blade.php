@extends('website.layouts.portfolio_inner_layout')
@section('title','Portfolio Details')
@section('pageContent')

    @include('website.portfolio_disktop_view')

    <script>
        sentContactMails('contactFormSubmit', 'contactBtnReport', 'FeedbackEnquerymessage');
        sentContactMails('contactFormSubmitMobile', 'contactBtnReportMobile', 'FeedbackEnqueryMobilemessage');
    </script>
@endsection