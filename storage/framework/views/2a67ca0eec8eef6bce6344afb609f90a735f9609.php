<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(__('menus.backend.category.main')); ?></a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="<?php echo e(route('admin.category.index')); ?>"><?php echo e(__('menus.backend.category.all')); ?></a>
                <a class="dropdown-item" href="<?php echo e(route('admin.category.create')); ?>"><?php echo e(__('menus.backend.category.create')); ?></a>
                <a class="dropdown-item" href="<?php echo e(route('admin.category.deactivated')); ?>"><?php echo e(__('menus.backend.category.deactivated')); ?></a>
                <a class="dropdown-item" href="<?php echo e(route('admin.category.deleted')); ?>"><?php echo e(__('menus.backend.category.deleted')); ?></a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
