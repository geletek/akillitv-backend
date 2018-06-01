<?php $__env->startSection('title', app_name() . ' | '.__('labels.frontend.passwords.expired_password_box_title')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <?php echo e(__('labels.frontend.passwords.expired_password_box_title')); ?>

                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <?php echo e(html()->form('PATCH', route('frontend.auth.password.expired.update'))->class('form-horizontal')->open()); ?>


                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <?php echo e(html()->label(__('validation.attributes.frontend.old_password'))->for('old_password')); ?>


                                    <?php echo e(html()->password('old_password')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.old_password'))
                                        ->required()); ?>

                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <?php echo e(html()->label(__('validation.attributes.frontend.password'))->for('password')); ?>


                                    <?php echo e(html()->password('password')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password'))
                                        ->required()); ?>

                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <?php echo e(html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation')); ?>


                                    <?php echo e(html()->password('password_confirmation')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                        ->required()); ?>

                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-0 clearfix">
                                    <?php echo e(form_submit(__('labels.frontend.passwords.update_password_button'))); ?>

                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                    <?php echo e(html()->form()->close()); ?>

                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col-6 -->
    </div><!-- row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>