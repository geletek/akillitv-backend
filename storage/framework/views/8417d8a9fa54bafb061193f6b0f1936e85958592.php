<?php $__env->startSection('title', app_name() . ' | ' . __('strings.backend.dashboard.title')); ?>

<?php $__env->startSection('content'); ?>



  <div class="row">
    <div class="col-lg-12">
     		<!--begin::Portlet-->
  		<div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
  			<div class="m-portlet__body">
  				<?php echo e(__('strings.backend.dashboard.welcome')); ?> <?php echo e($logged_in_user->name); ?>

  			</div>
  		</div>
  		<!--end::Portlet-->
    </div>
  </div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>