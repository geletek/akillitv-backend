@extends ('backend.layouts.app')

@section ('title', __('labels.backend.video.category.management') . ' | ' . __('labels.backend.video.category.create'))

@section('breadcrumb-links')
    @include('backend.video.category.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.video.category.store'))->class('form-horizontal')->open() }}
      <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">

          <div class="m-portlet__head">
    				<div class="m-portlet__head-caption">
    					<div class="m-portlet__head-title">
    						<span class="m-portlet__head-icon m--hide">
    						<i class="la la-gear"></i>
    						</span>
    						<h3 class="m-portlet__head-text">
                    {{ __('labels.backend.video.category.management') }} <small>{{ __('labels.backend.video.category.create') }}</small>
    						</h3>
    					</div>
    				</div>
    			</div>
          <div class="m-portlet__body">

                  <div class="row mt-4 mb-4">
                      <div class="col">
                          <div class="form-group row">
                              {{ html()->label(__('validation.attributes.backend.video.category.title'))->class('col-md-2 form-control-label')->for('title') }}

                              <div class="col-md-10">
                                  {{ html()->text('title')
                                      ->class('form-control')
                                      ->placeholder(__('validation.attributes.backend.video.category.title'))
                                      ->attribute('maxlength', 191)
                                      ->required()
                                      ->autofocus() }}
                              </div><!--col-->
                          </div><!--form-group-->

                          <div class="form-group row">
                          {{ html()->label(__('validation.attributes.backend.video.category.description'))->class('col-md-2 form-control-label')->for('description') }}

                              <div class="col-md-10">
                                  {{ html()->text('description')
                                      ->class('form-control')
                                      ->placeholder(__('validation.attributes.backend.video.category.description'))
                                      ->attribute('maxlength', 191)
                                      ->required() }}
                              </div><!--col-->
                          </div><!--form-group-->

                          <div class="form-group row">
                              {{ html()->label(__('validation.attributes.backend.video.category.active'))->class('col-md-2 form-control-label')->for('active') }}
                              <div class="col-md-10">
                                  <select name="status" id="status" class="form-control" required="required">
                                      <option value="active">{{ __('strings.backend.active') }}</option>
                                      <option value="passive">{{ __('strings.backend.passive') }}</option>
                                  </select>
                              </div><!--col-->

                          </div><!--form-group-->

                      </div><!--col-->
                  </div><!--row-->

          </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.video.category.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection
