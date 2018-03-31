@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')



  <div class="row">
    <div class="col-lg-12">
     		<!--begin::Portlet-->
  		<div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
  			<div class="m-portlet__body">
  				{{ __('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}
  			</div>
  		</div>
  		<!--end::Portlet-->
    </div>
  </div>





@endsection
