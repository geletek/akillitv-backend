<?php $__env->startSection('title', app_name() . ' | '.__('navs.general.home')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-home"></i> <?php echo e(__('navs.general.home')); ?>

                </div>
                <div class="card-body">
                    <?php echo e(__('strings.frontend.welcome_to', ['place' => app_name()])); ?>

                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

    <div class="row mb-4">
        <div class="col">
            <example-component></example-component>
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-fort-awesome"></i> Font Awesome <?php echo e(__('strings.frontend.test')); ?>

                </div>
                <div class="card-body">
                    <i class="fa fa-home"></i>
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-pinterest"></i>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>