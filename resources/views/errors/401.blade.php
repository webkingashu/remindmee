@extends('app')

@section('htmlheader_title')
    Page not found
@endsection

@section('contentheader_title')
    401 Error Page
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')

<div class="error-page">
    <h2 class="headline text-yellow"> 401</h2>
    <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> Oops! Restricted Area</h3>
        <p>
            Uh Ohh!! This Action is Not Authorized
            You may <a href='{{ url('/home') }}'>return to dashboard</a> and report to support.
        </p>
        
    </div><!-- /.error-content -->
</div><!-- /.error-page -->
@endsection