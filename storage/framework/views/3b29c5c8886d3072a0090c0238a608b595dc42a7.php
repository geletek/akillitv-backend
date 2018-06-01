<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th><?php echo e(__('labels.backend.access.users.tabs.content.overview.avatar')); ?></th>
                <td><img src="<?php echo e($user->picture); ?>" class="user-profile-image" /></td>
            </tr>

            <tr>
                <th><?php echo e(__('labels.backend.access.users.tabs.content.overview.name')); ?></th>
                <td><?php echo e($user->name); ?></td>
            </tr>

            <tr>
                <th><?php echo e(__('labels.backend.access.users.tabs.content.overview.email')); ?></th>
                <td><?php echo e($user->email); ?></td>
            </tr>

            <tr>
                <th><?php echo e(__('labels.backend.access.users.tabs.content.overview.status')); ?></th>
                <td><?php echo $user->status_label; ?></td>
            </tr>

            <tr>
                <th><?php echo e(__('labels.backend.access.users.tabs.content.overview.confirmed')); ?></th>
                <td><?php echo $user->confirmed_label; ?></td>
            </tr>
        </table>
    </div>
</div><!--table-responsive-->