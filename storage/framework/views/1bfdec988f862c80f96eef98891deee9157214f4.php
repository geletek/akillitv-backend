

<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
	<i class="la la-close"></i>
</button>


<div id="m_aside_left" class="m-aside-left  m-aside-left--skin-dark ">
	<!-- BEGIN: Aside Menu -->
	<div 		id="m_ver_menu" 		class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 		data-menu-vertical="true"		 data-menu-scrollable="true" data-menu-dropdown-timeout="500"  		>
		<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">


			<li class="m-menu__section">
					<h4 class="m-menu__section-text">
						<?php echo e(__('menus.backend.sidebar.general')); ?>

					</h4>
					<i class="m-menu__section-icon flaticon-more-v3"></i>
			</li>

			<li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
					<a class="m-menu__link <?php echo e(active_class(Active::checkUriPattern('admin/dashboard'))); ?>" href="<?php echo e(route('admin.dashboard')); ?>">
						<i class="m-menu__link-icon flaticon-dashboard"></i>
						<span class="m-menu__link-text">
								<?php echo e(__('menus.backend.sidebar.dashboard')); ?>

						</span>
					</a>
			</li>

			<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
				<a  href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-imac"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								<?php echo e(__('menus.backend.video.title')); ?>

							</span>
						</span>
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu ">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item <?php echo e(active_class(Active::checkUriPattern('admin/video/category*'))); ?>" aria-haspopup="true"  data-redirect="true">
							<a  href="<?php echo e(route('admin.video.category.index')); ?>" class="m-menu__link ">
								<span class="m-menu__link-text">
									<?php echo e(__('menus.backend.video.categories.management')); ?>

								</span>

								<?php if($pending_approval > 0): ?>
								<span class="m-menu__link-badge">
										<span class="m-badge m-badge--danger">
											<?php echo e($pending_approval); ?>

										</span>
								</span>
								<?php endif; ?>

							</a>
						</li>
						<li class="m-menu__item <?php echo e(active_class(Active::checkUriPattern('admin/video/video*'))); ?>" aria-haspopup="true"  data-redirect="true">
							<a  href="<?php echo e(route('admin.video.video.index')); ?>" class="m-menu__link ">
								<span class="m-menu__link-text">
									<?php echo e(__('menus.backend.video.video.management')); ?>

								</span>

								<?php if($pending_approval > 0): ?>
								<span class="m-menu__link-badge">
										<span class="m-badge m-badge--danger">
											<?php echo e($pending_approval); ?>

										</span>
								</span>
								<?php endif; ?>
							</a>
						</li>
					</ul>
				</div>
			</li>




			<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
				<a  href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-users"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								<?php echo e(__('menus.backend.access.title')); ?>

							</span>
						</span>
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu ">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item <?php echo e(active_class(Active::checkUriPattern('admin/auth/user*'))); ?>" aria-haspopup="true"  data-redirect="true">
							<a  href="<?php echo e(route('admin.auth.user.index')); ?>" class="m-menu__link ">
								<span class="m-menu__link-text">
									<?php echo e(__('menus.backend.access.users.management')); ?>

								</span>

								<?php if($pending_approval > 0): ?>
								<span class="m-menu__link-badge">
										<span class="m-badge m-badge--danger">
											<?php echo e($pending_approval); ?>

										</span>
								</span>
								<?php endif; ?>

							</a>
						</li>
						<li class="m-menu__item <?php echo e(active_class(Active::checkUriPattern('admin/auth/role*'))); ?>" aria-haspopup="true"  data-redirect="true">
							<a  href="<?php echo e(route('admin.auth.role.index')); ?>" class="m-menu__link ">
								<span class="m-menu__link-text">
									<?php echo e(__('menus.backend.access.roles.management')); ?>

								</span>
							</a>
						</li>
					</ul>
				</div>
			</li>








			<li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
					<a class="m-menu__link <?php echo e(active_class(Active::checkUriPattern('admin/log-viewer/logs*'))); ?>" href="<?php echo e(route('log-viewer::logs.list')); ?>">
						<i class="m-menu__link-icon flaticon-notes"></i>
						<span class="m-menu__link-text">
								<?php echo e(__('menus.backend.log-viewer.logs')); ?>

						</span>
					</a>
			</li>

		</ul>
	</div>
	<!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->
