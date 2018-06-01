<?php $__env->startSection('title', __('labels.backend.video.category.management') . ' | ' . __('labels.backend.video.category.deleted')); ?>

<?php $__env->startSection('breadcrumb-links'); ?>
    <?php echo $__env->make('backend.video.category.includes.breadcrumb-links', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    <?php echo e(__('labels.backend.video.category.management')); ?>

                    <small class="text-muted"><?php echo e(__('labels.backend.video.category.deleted')); ?></small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(__('labels.backend.video.category.table.title')); ?></th>
                            <th><?php echo e(__('labels.backend.video.category.table.status')); ?></th>
                            <th><?php echo e(__('labels.general.actions')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($categories->count()): ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($category->id); ?></td>
                                <td><?php echo e($category->title); ?></td>
                                <td><?php echo e($category->status); ?></td>
                                <td><?php echo $category->action_buttons; ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr><td colspan="9"><p class="text-center"><?php echo e(__('strings.backend.video.category.no_deleted')); ?></p></td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    <?php echo $categories->total(); ?> <?php echo e(trans_choice('labels.backend.video.category.table.total', $categories->total())); ?>

                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    <?php echo $categories->render(); ?>

                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>