<?php $__env->startSection('title', __('labels.backend.category.management') . ' | ' . __('labels.backend.category.create')); ?>

<?php $__env->startSection('breadcrumb-links'); ?>
    <?php echo $__env->make('backend.category.includes.breadcrumb-links', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo e(html()->form('POST', route('admin.category.store'))->class('form-horizontal')->open()); ?>

      <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">

          <div class="m-portlet__head">
    				<div class="m-portlet__head-caption">
    					<div class="m-portlet__head-title">
    						<span class="m-portlet__head-icon m--hide">
    						<i class="la la-gear"></i>
    						</span>
    						<h3 class="m-portlet__head-text">
                    <?php echo e(__('labels.backend.category.management')); ?> <small><?php echo e(__('labels.backend.category.create')); ?></small>
    						</h3>
    					</div>
    				</div>
    			</div>
          <div class="m-portlet__body">

                  <div class="row mt-4 mb-4">
                      <div class="col">
                          <div class="form-group row">
                              <?php echo e(html()->label(__('validation.attributes.backend.category.title'))->class('col-md-2 form-control-label')->for('title')); ?>


                              <div class="col-md-10">
                                  <?php echo e(html()->text('title')
                                      ->class('form-control')
                                      ->placeholder(__('validation.attributes.backend.category.title'))
                                      ->attribute('maxlength', 191)
                                      ->required()
                                      ->autofocus()); ?>

                              </div><!--col-->
                          </div><!--form-group-->

                          <div class="form-group row">
                          <?php echo e(html()->label(__('validation.attributes.backend.category.description'))->class('col-md-2 form-control-label')->for('description')); ?>


                              <div class="col-md-10">
                                  <?php echo e(html()->text('description')
                                      ->class('form-control')
                                      ->placeholder(__('validation.attributes.backend.category.description'))
                                      ->attribute('maxlength', 191)
                                      ->required()); ?>

                              </div><!--col-->
                          </div><!--form-group-->

                          <div class="form-group row">
                              <?php echo e(html()->label(__('validation.attributes.backend.category.active'))->class('col-md-2 form-control-label')->for('active')); ?>

                              <div class="col-md-10">
                                  <select name="status" id="status" class="form-control" required="required">
                                      <option value="active"><?php echo e(__('strings.backend.active')); ?></option>
                                      <option value="passive"><?php echo e(__('strings.backend.passive')); ?></option>
                                  </select>
                              </div><!--col-->

                          </div><!--form-group-->

                      </div><!--col-->
                  </div><!--row-->

          </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        <?php echo e(form_cancel(route('admin.category.index'), __('buttons.general.cancel'))); ?>

                    </div><!--col-->

                    <div class="col text-right">
                        <?php echo e(form_submit(__('buttons.general.crud.create'))); ?>

                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    <?php echo e(html()->form()->close()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>