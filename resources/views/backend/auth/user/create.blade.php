@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.auth.user.store'))->class('form-horizontal')->open() }}
      <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi m-portlet--tabs">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                {{ __('labels.backend.access.users.management') }} <small>{{ __('labels.backend.access.users.create') }}</small>
                </h3>
              </div>
            </div>
            <div class="m-portlet__head-tools">
              <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--right m-tabs-line--danger" role="tablist">
                <li class="nav-item m-tabs__item">
                  <a class="nav-link m-tabs__link active" data-toggle="tab" href="#login_creditentials" role="tab">
                    <i class="la la-comments-o"></i>
                    Giriş Bilgileri
                  </a>
                </li>
                <li class="nav-item m-tabs__item">
                  <a class="nav-link m-tabs__link" data-toggle="tab" href="#personel_creditentials" role="tab">
                    <i class="la la-comments-o"></i>
                    Kişisel Bilgiler
                  </a>
                </li>

              </ul>
            </div>
          </div>
          <div class="m-portlet__body">
            <div class="tab-content">
              <div class="tab-pane active" id="login_creditentials">
                  <div class="row mt-4 mb-4">
                      <div class="col">
                          <div class="form-group row">
                              {{ html()->label(__('validation.attributes.backend.access.users.first_name'))->class('col-md-2 form-control-label')->for('first_name') }}

                              <div class="col-md-10">
                                  {{ html()->text('first_name')
                                      ->class('form-control')
                                      ->placeholder(__('validation.attributes.backend.access.users.first_name'))
                                      ->attribute('maxlength', 191)
                                      ->required()
                                      ->autofocus() }}
                              </div><!--col-->
                          </div><!--form-group-->

                          <div class="form-group row">
                          {{ html()->label(__('validation.attributes.backend.access.users.last_name'))->class('col-md-2 form-control-label')->for('last_name') }}

                              <div class="col-md-10">
                                  {{ html()->text('last_name')
                                      ->class('form-control')
                                      ->placeholder(__('validation.attributes.backend.access.users.last_name'))
                                      ->attribute('maxlength', 191)
                                      ->required() }}
                              </div><!--col-->
                          </div><!--form-group-->

                          <div class="form-group row">
                              {{ html()->label(__('validation.attributes.backend.access.users.email'))->class('col-md-2 form-control-label')->for('email') }}

                              <div class="col-md-10">
                                  {{ html()->email('email')
                                      ->class('form-control')
                                      ->placeholder(__('validation.attributes.backend.access.users.email'))
                                      ->attribute('maxlength', 191)
                                      ->required() }}
                              </div><!--col-->
                          </div><!--form-group-->

                          <div class="form-group row">
                              {{ html()->label(__('validation.attributes.backend.access.users.password'))->class('col-md-2 form-control-label')->for('password') }}

                              <div class="col-md-10">
                                  {{ html()->password('password')
                                      ->class('form-control')
                                      ->placeholder(__('validation.attributes.backend.access.users.password'))
                                      ->required() }}
                              </div><!--col-->
                          </div><!--form-group-->

                          <div class="form-group row">
                              {{ html()->label(__('validation.attributes.backend.access.users.password_confirmation'))->class('col-md-2 form-control-label')->for('password_confirmation') }}

                              <div class="col-md-10">
                                  {{ html()->password('password_confirmation')
                                      ->class('form-control')
                                      ->placeholder(__('validation.attributes.backend.access.users.password_confirmation'))
                                      ->required() }}
                              </div><!--col-->
                          </div><!--form-group-->

                          <div class="form-group row">
                              {{ html()->label(__('validation.attributes.backend.access.users.timezone'))->class('col-md-2 form-control-label')->for('timezone') }}

                              <div class="col-md-10">
                                  <select name="timezone" id="timezone" class="form-control" required="required">
                                      @foreach (timezone_identifiers_list() as $timezone)
                                          <option value="{{ $timezone }}" {{ $timezone == config('app.timezone') ? 'selected' : '' }} {{ $timezone == old('timezone') ? ' selected' : '' }}>{{ $timezone }}</option>
                                      @endforeach
                                  </select>
                              </div><!--col-->
                          </div><!--form-group-->

                          <div class="form-group row">
                              {{ html()->label(__('validation.attributes.backend.access.users.active'))->class('col-md-2 form-control-label')->for('active') }}

                              <div class="col-md-10">
                                  <label class="switch switch-3d switch-primary">
                                      {{ html()->checkbox('active', true, '1')->class('switch-input') }}
                                      <span class="switch-label"></span>
                                      <span class="switch-handle"></span>
                                  </label>
                              </div><!--col-->
                          </div><!--form-group-->

                          <div class="form-group row">
                              {{ html()->label(__('validation.attributes.backend.access.users.confirmed'))->class('col-md-2 form-control-label')->for('confirmed') }}

                              <div class="col-md-10">
                                  <label class="switch switch-3d switch-primary">
                                      {{ html()->checkbox('confirmed', true, '1')->class('switch-input') }}
                                      <span class="switch-label"></span>
                                      <span class="switch-handle"></span>
                                  </label>
                              </div><!--col-->
                          </div><!--form-group-->

                          @if (! config('access.users.requires_approval'))
                              <div class="form-group row">
                                  {{ html()->label(__('validation.attributes.backend.access.users.send_confirmation_email') . '<br/>' . '<small>' .  __('strings.backend.access.users.if_confirmed_off') . '</small>')->class('col-md-2 form-control-label')->for('confirmation_email') }}

                                  <div class="col-md-10">
                                      <label class="switch switch-3d switch-primary">
                                          {{ html()->checkbox('confirmation_email', true, '1')->class('switch-input') }}
                                          <span class="switch-label"></span>
                                          <span class="switch-handle"></span>
                                      </label>
                                  </div><!--col-->
                              </div><!--form-group-->
                          @endif

                          <div class="form-group row">
                              {{ html()->label('Abilities')->class('col-md-2 form-control-label') }}

                              <div class="col-md-10">
                                  <div class="table-responsive">
                                      <table class="table">
                                          <thead>
                                          <tr>
                                              <th>{{ __('labels.backend.access.users.table.roles') }}</th>
                                              <th>{{ __('labels.backend.access.users.table.permissions') }}</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                          <tr>
                                              <td>
                                                  @if ($roles->count())
                                                      @foreach($roles as $role)
                                                          <div class="card">
                                                              <div class="card-header">
                                                                  <div class="checkbox">
                                                                      {{ html()->label(
                                                                              html()->checkbox('roles[]', old('roles') && in_array($role->name, old('roles')) ? true : false, $role->name)
                                                                                    ->class('switch-input')
                                                                                    ->id('role-'.$role->id)
                                                                              . '<span class="switch-label"></span><span class="switch-handle"></span>')
                                                                          ->class('switch switch-sm switch-3d switch-primary')
                                                                          ->for('role-'.$role->id) }}
                                                                      {{ html()->label(ucwords($role->name))->for('role-'.$role->id) }}
                                                                  </div>
                                                              </div>
                                                              <div class="card-body">
                                                                  @if ($role->id != 1)
                                                                      @if ($role->permissions->count())
                                                                          @foreach ($role->permissions as $permission)
                                                                              <i class="fa fa-dot-circle-o"></i> {{ ucwords($permission->name) }}
                                                                          @endforeach
                                                                      @else
                                                                          {{ __('labels.general.none') }}
                                                                      @endif
                                                                  @else
                                                                      {{ __('labels.backend.access.users.all_permissions') }}
                                                                  @endif
                                                              </div>
                                                          </div><!--card-->
                                                      @endforeach
                                                  @endif
                                              </td>
                                              <td>
                                                  @if ($permissions->count())
                                                      @foreach($permissions as $permission)
                                                          <div class="checkbox">
                                                              {{ html()->label(
                                                                      html()->checkbox('permissions[]', old('permissions') && in_array($permission->name, old('permissions')) ? true : false, $permission->name)
                                                                            ->class('switch-input')
                                                                            ->id('permission-'.$permission->id)
                                                                      . '<span class="switch-label"></span><span class="switch-handle"></span>')
                                                                  ->class('switch switch-sm switch-3d switch-primary')
                                                                  ->for('permission-'.$permission->id) }}
                                                              {{ html()->label(ucwords($permission->name))->for('permission-'.$permission->id) }}
                                                          </div>
                                                      @endforeach
                                                  @endif
                                              </td>
                                          </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div><!--col-->
                          </div><!--form-group-->
                      </div><!--col-->
                  </div><!--row-->
              </div>
              <div class="tab-pane" id="personel_creditentials">
                  <div class="row mt-4 mb-4">
                      <div class="col">
                          <div class="form-group row">
                              {{ html()->label(__('validation.attributes.backend.access.users.aboutMe'))->class('col-md-2 form-control-label')->for('first_name') }}

                              <div class="col-md-10">
                                  {{ html()->textarea('aboutMe')
                                      ->class('form-control')
                                      ->placeholder(__('validation.attributes.backend.access.users.aboutMe'))
                                      ->attribute('maxlength', 255)
                                      ->attribute('rows', 6)
                                      ->required()
                                      ->autofocus() }}
                              </div><!--col-->
                          </div><!--form-group-->
                      </div>
                  </div>
              </div>
            </div>
          </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection
