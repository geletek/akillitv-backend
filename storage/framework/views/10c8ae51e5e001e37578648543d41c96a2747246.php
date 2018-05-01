<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(__('menus.backend.server.main')); ?></a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="<?php echo e(route('admin.server.index')); ?>"><?php echo e(__('menus.backend.server.all')); ?></a>
                <a class="dropdown-item" href="<?php echo e(route('admin.server.create')); ?>"><?php echo e(__('menus.backend.server.create')); ?></a>
                <a class="dropdown-item" href="<?php echo e(route('admin.server.deactivated')); ?>"><?php echo e(__('menus.backend.server.deactivated')); ?></a>
                <a class="dropdown-item" href="<?php echo e(route('admin.server.deleted')); ?>"><?php echo e(__('menus.backend.server.deleted')); ?></a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
