<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <a href="<?php echo e(route('frontend.index')); ?>" class="navbar-brand"><?php echo e(app_name()); ?></a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('labels.general.toggle_navigation')); ?>">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <?php if(config('locale.status') && count(config('locale.languages')) > 1): ?>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLanguageLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"><?php echo e(__('menus.language-picker.language')); ?> (<?php echo e(strtoupper(app()->getLocale())); ?>)</a>

                    <?php echo $__env->make('includes.partials.lang', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </li>
            <?php endif; ?>

            <?php if(auth()->guard()->check()): ?>
                <li class="nav-item"><a href="<?php echo e(route('frontend.user.dashboard')); ?>" class="nav-link <?php echo e(active_class(Active::checkRoute('frontend.user.dashboard'))); ?>"><?php echo e(__('navs.frontend.dashboard')); ?></a></li>
            <?php endif; ?>

            <?php if(auth()->guard()->guest()): ?>
                <li class="nav-item"><a href="<?php echo e(route('frontend.auth.login')); ?>" class="nav-link <?php echo e(active_class(Active::checkRoute('frontend.auth.login'))); ?>"><?php echo e(__('navs.frontend.login')); ?></a></li>

                <?php
                /*
                ?>
                @if (config('access.registration'))
                    <li class="nav-item"><a href="{{route('frontend.auth.register')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.register')) }}">{{ __('navs.frontend.register') }}</a></li>
                @endif
                <?php
                */
                ?>
            <?php else: ?>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"><?php echo e($logged_in_user->name); ?></a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view backend')): ?>
                            <a href="<?php echo e(route('admin.dashboard')); ?>" class="dropdown-item"><?php echo e(__('navs.frontend.user.administration')); ?></a>
                        <?php endif; ?>

                        <a href="<?php echo e(route('frontend.user.account')); ?>" class="dropdown-item <?php echo e(active_class(Active::checkRoute('frontend.user.account'))); ?>"><?php echo e(__('navs.frontend.user.account')); ?></a>
                        <a href="<?php echo e(route('frontend.auth.logout')); ?>" class="dropdown-item"><?php echo e(__('navs.general.logout')); ?></a>
                    </div>
                </li>
            <?php endif; ?>
            <?php
            /*
            ?>
            <li class="nav-item"><a href="{{route('frontend.contact')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.contact')) }}">{{ __('navs.frontend.contact') }}</a></li>
            <?php
            */
            ?>
        </ul>
    </div>
</nav>
