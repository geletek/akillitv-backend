@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('labels.backend.video.category.management'))

@section('breadcrumb-links')
    @include('backend.video.category.includes.breadcrumb-links')
@endsection

@section('content')
     	<!--begin::Portlet-->
  		<div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
  			<div class="m-portlet__body">


                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">
                                {{ __('labels.backend.video.category.management') }} <small class="text-muted">{{ __('labels.backend.video.category.active') }}</small>
                            </h4>
                        </div><!--col-->

                        <div class="col-sm-7">
                            @include('backend.video.category.includes.header-buttons')
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row mt-4">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('labels.backend.video.category.table.title') }}</th>
                                        <th>{{ __('labels.backend.video.category.table.status') }}</th>
                                        <th>{{ __('labels.general.actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->title }}</td>
                                            <td>{{ $category->status }}</td>
                                            <td>{!! $category->action_buttons !!}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!--col-->
                    </div><!--row-->
                    <div class="row">
                        <div class="col-7">
                            <div class="float-left">
                                {!! $categories->total() !!} {{ trans_choice('labels.backend.video.category.table.total', $categories->total()) }}
                            </div>
                        </div><!--col-->

                        <div class="col-5">
                            <div class="float-right">
                                {!! $categories->render() !!}
                            </div>
                        </div><!--col-->
                    </div><!--row-->


        </div>
    	</div>
      <!--end::Portlet-->

@endsection
