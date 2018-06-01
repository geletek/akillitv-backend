<!-- BEGIN: Subheader -->
<div class="m-subheader ">
	<div class="d-flex align-items-center">
 		<div class="mr-auto">
			<h3 class="m-subheader__title m-subheader__title--separator"><?php echo e(__('menus.backend.video.category.main')); ?></h3>
      <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
					<li class="m-nav__item m-nav__item--home">
						<a href="#" class="m-nav__link m-nav__link--icon">
						   <i class="m-nav__link-icon la la-home"></i>
						</a>
					</li>
					<li class="m-nav__separator">-</li>
					<li class="m-nav__item">
							<a href="<?php echo e(route('admin.dashboard')); ?>" class="m-nav__link">
								<span class="m-nav__link-text"><?php echo __('navs.backend.dashboard'); ?></span>
							</a>
					</li>
          <li class="m-nav__separator">-</li>
					<li class="m-nav__item">
              <a class="m-nav__link-text" href="#" role="button"><?php echo e(__('menus.backend.video.category.main')); ?></a>
					</li>
        </ul>
      </div>
  		<div>
        <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
					<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
						<i class="la la-plus m--hide"></i>
						<i class="la la-ellipsis-h"></i>
					</a>
					<div class="m-dropdown__wrapper">
						<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
						<div class="m-dropdown__inner">
							<div class="m-dropdown__body">
								<div class="m-dropdown__content">
									<ul class="m-nav">
										<li class="m-nav__section m-nav__section--first m--hide">
											<span class="m-nav__section-text"><?php echo e(__('menus.backend.video.category.main')); ?></span>
										</li>
										<li class="m-nav__item">
											<a href="<?php echo e(route('admin.video.category.index')); ?>" class="m-nav__link">
											<i class="m-nav__link-icon flaticon-share"></i>
											<span class="m-nav__link-text"><?php echo e(__('menus.backend.video.category.all')); ?></span>
											</a>
										</li>
										<li class="m-nav__item">
											<a href="<?php echo e(route('admin.video.category.create')); ?>" class="m-nav__link">
											<i class="m-nav__link-icon flaticon-chat-1"></i>
											<span class="m-nav__link-text"><?php echo e(__('menus.backend.video.category.create')); ?></span>
											</a>
										</li>
										<li class="m-nav__item">
											<a href="<?php echo e(route('admin.video.category.deactivated')); ?>" class="m-nav__link">
											<i class="m-nav__link-icon flaticon-info"></i>
											<span class="m-nav__link-text"><?php echo e(__('menus.backend.video.category.deactivated')); ?></span>
											</a>
										</li>
										<li class="m-nav__item">
											<a href="<?php echo e(route('admin.video.category.deleted')); ?>" class="m-nav__link">
											<i class="m-nav__link-icon flaticon-lifebuoy"></i>
											<span class="m-nav__link-text"><?php echo e(__('menus.backend.video.category.deleted')); ?></span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			  		</div>
	</div>
</div>
<!-- END: Subheader -->
