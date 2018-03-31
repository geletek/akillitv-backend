<!-- BEGIN: Header -->
<header class="m-grid__item    m-header "  data-minimize="minimize" data-minimize-mobile="minimize" data-minimize-offset="200" data-minimize-mobile-offset="200" >
	<div class="m-container m-container--fluid m-container--full-height">
		<div class="m-stack m-stack--ver m-stack--desktop  m-header__wrapper">
			<!--[html-partial:include:{"file":"partials\/_brand-mobile.html"}]/-->
      @include('backend.includes.partials.brandMobile')

			<div class="m-stack__item m-stack__item--middle m-stack__item--left m-header-head" id="m_header_nav">
				<!--[html-partial:include:{"file":"partials\/_header-hor-menu.html"}]/-->
        @include('backend.includes.partials.headerHorMenu')
			</div>
			<div class="m-stack__item m-stack__item--middle m-stack__item--center">
				<!--[html-partial:include:{"file":"partials\/_brand-desktop.html"}]/-->
        @include('backend.includes.partials.brandDesktop')
			</div>
			<div class="m-stack__item m-stack__item--right">
				<!--[html-partial:include:{"file":"partials\/_header-topbar.html"}]/-->
        @include('backend.includes.partials.headerTopbar')
			</div>
		</div>
	</div>
</header>
<!-- END: Header -->
