<?php $__env->startSection('title', app_name() . ' | ' . __('labels.backend.server.management')); ?>

<?php $__env->startSection('breadcrumb-links'); ?>
    <?php echo $__env->make('backend.server.includes.breadcrumb-links', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
     	<!--begin::Portlet-->
  		<div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
  			<div class="m-portlet__body">


                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">
                                <?php echo e(__('labels.backend.server.management')); ?> <small class="text-muted"><?php echo e(__('labels.backend.server.active')); ?></small>
                            </h4>
                        </div><!--col-->

                        <div class="col-sm-7">
                            <?php echo $__env->make('backend.server.includes.header-buttons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row mt-4">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><?php echo e(__('labels.backend.server.table.title')); ?></th>
                                        <th><?php echo e(__('labels.backend.server.table.ipAddress')); ?></th>
                                        <th><?php echo e(__('labels.backend.server.table.serverType')); ?></th>
                                        <th><?php echo e(__('labels.backend.server.table.status')); ?></th>
                                        <th><?php echo e(__('labels.general.actions')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $servers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $server): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($server->title); ?></td>
                                            <td><?php echo e($server->ipAddress); ?></td>
                                            <td><?php echo e(ucfirst($server->serverType)); ?></td>
                                            <td><?php echo e(ucfirst($server->status)); ?></td>
                                            <td><?php echo $server->action_buttons; ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div><!--col-->
                    </div><!--row-->
                    <div class="row">
                        <div class="col-7">
                            <div class="float-left">
                                <?php echo $servers->total(); ?> <?php echo e(trans_choice('labels.backend.server.table.total', $servers->total())); ?>

                            </div>
                        </div><!--col-->

                        <div class="col-5">
                            <div class="float-right">
                                <?php echo $servers->render(); ?>

                            </div>
                        </div><!--col-->
                    </div><!--row-->


        </div>
    	</div>
      <!--end::Portlet-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>