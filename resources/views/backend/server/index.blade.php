@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('labels.backend.server.management'))

@section('breadcrumb-links')
    @include('backend.server.includes.breadcrumb-links')
@endsection

@section('content')
     	<!--begin::Portlet-->
  		<div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
  			<div class="m-portlet__body">


                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">
                                {{ __('labels.backend.server.management') }} <small class="text-muted">{{ __('labels.backend.server.active') }}</small>
                            </h4>
                        </div><!--col-->

                        <div class="col-sm-7">
                            @include('backend.server.includes.header-buttons')
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row mt-4">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>{{ __('labels.backend.server.table.title') }}</th>
                                        <th>{{ __('labels.backend.server.table.ipAddress') }}</th>
                                        <th>{{ __('labels.backend.server.table.serverType') }}</th>
                                        <th>{{ __('labels.backend.server.table.status') }}</th>
                                        <th>{{ __('labels.general.actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($servers as $server)
                                        <tr>
                                            <td>{{ $server->title }}</td>
                                            <td>{{ $server->ipAddress }}</td>
                                            <td>{{ ucfirst($server->serverType) }}</td>
                                            <td>{{ ucfirst($server->status) }}</td>
                                            <td>{!! $server->action_buttons !!}</td>
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
                                {!! $servers->total() !!} {{ trans_choice('labels.backend.server.table.total', $servers->total()) }}
                            </div>
                        </div><!--col-->

                        <div class="col-5">
                            <div class="float-right">
                                {!! $servers->render() !!}
                            </div>
                        </div><!--col-->
                    </div><!--row-->


        </div>
    	</div>
      <!--end::Portlet-->

@endsection
