<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('menus.backend.server.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.server.index') }}">{{ __('menus.backend.server.all') }}</a>
                <a class="dropdown-item" href="{{ route('admin.server.create') }}">{{ __('menus.backend.server.create') }}</a>
                <a class="dropdown-item" href="{{ route('admin.server.deactivated') }}">{{ __('menus.backend.server.deactivated') }}</a>
                <a class="dropdown-item" href="{{ route('admin.server.deleted') }}">{{ __('menus.backend.server.deleted') }}</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
