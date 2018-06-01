<?php $__env->startSection('title', app_name() . ' | Contact Us'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <?php echo e(__('labels.frontend.contact.box_title')); ?>

                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <?php echo e(html()->form('POST', route('frontend.contact.send'))->open()); ?>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <?php echo e(html()->label(__('validation.attributes.frontend.name'))->for('name')); ?>


                                    <?php echo e(html()->text('name')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.name'))
                                        ->attribute('maxlength', 191)
                                        ->required()
                                        ->autofocus()); ?>

                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <?php echo e(html()->label(__('validation.attributes.frontend.email'))->for('email')); ?>


                                    <?php echo e(html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        ->required()); ?>

                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <?php echo e(html()->label(__('validation.attributes.frontend.phone'))->for('phone')); ?>


                                    <?php echo e(html()->text('phone')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.phone'))
                                        ->attribute('maxlength', 191)
                                        ->required()); ?>

                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <?php echo e(html()->label(__('validation.attributes.frontend.message'))->for('message')); ?>


                                    <?php echo e(html()->textarea('message')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.message'))
                                        ->attribute('rows', 3)); ?>

                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-0 clearfix">
                                    <?php echo e(form_submit(__('labels.frontend.contact.button'))); ?>

                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    <?php echo e(html()->form()->close()); ?>

                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>