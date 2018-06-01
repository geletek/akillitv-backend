<?php $__env->startSection('title', app_name() . ' | ' . __('labels.backend.access.users.management')); ?>

<?php $__env->startSection('breadcrumb-links'); ?>
    <?php echo $__env->make('backend.auth.user.includes.breadcrumb-links', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
     	<!--begin::Portlet-->
  		<div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
  			<div class="m-portlet__body">


                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">
                                <?php echo e(__('labels.backend.access.users.management')); ?> <small class="text-muted"><?php echo e(__('labels.backend.access.users.active')); ?></small>
                            </h4>
                        </div><!--col-->

                        <div class="col-sm-7">
                            <?php echo $__env->make('backend.auth.user.includes.header-buttons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row mt-4">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>                                 
                                        <th><?php echo e(__('labels.backend.access.users.table.last_name')); ?></th>
                                        <th><?php echo e(__('labels.backend.access.users.table.first_name')); ?></th>
                                        <th><?php echo e(__('labels.backend.access.users.table.email')); ?></th>
                                        <th><?php echo e(__('labels.backend.access.users.table.dogum_tarihi')); ?></th>
                                        <th><?php echo e(__('labels.backend.access.users.table.telefon_no')); ?></th>
                                        <th><?php echo e(__('labels.backend.access.users.table.confirmed')); ?></th>
                                        <th><?php echo e(__('labels.backend.access.users.table.roles')); ?></th>
                                        <th><?php echo e(__('labels.backend.access.users.table.other_permissions')); ?></th>
                                        <th><?php echo e(__('labels.backend.access.users.table.social')); ?></th>
                                        <th><?php echo e(__('labels.backend.access.users.table.last_updated')); ?></th>
                                        <th><?php echo e(__('labels.general.actions')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($user->last_name); ?></td>
                                            <td><?php echo e($user->first_name); ?></td>
                                            <td><?php echo e($user->email); ?></td>
                                            <td><?php echo e($user->dogum_tarihi); ?></td>
                                            <td><?php echo e($user->telefon_no); ?></td>
                                            <td><?php echo $user->confirmed_label; ?></td>
                                            <td><?php echo $user->roles_label; ?></td>
                                            <td><?php echo $user->permissions_label; ?></td>
                                            <td><?php echo $user->social_buttons; ?></td>
                                            <td><?php echo e($user->updated_at->diffForHumans()); ?></td>
                                            <td><?php echo $user->action_buttons; ?></td>
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
                                <?php echo $users->total(); ?> <?php echo e(trans_choice('labels.backend.access.users.table.total', $users->total())); ?>

                            </div>
                        </div><!--col-->

                        <div class="col-5">
                            <div class="float-right">
                                <?php echo $users->render(); ?>

                            </div>
                        </div><!--col-->
                    </div><!--row-->


        </div>
    	</div>
      <!--end::Portlet-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>