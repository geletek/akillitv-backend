<?php

Breadcrumbs::register('admin.video.category.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('menus.backend.videos.category.management'), route('admin.video.category.index'));
});

Breadcrumbs::register('admin.video.category.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.video.category.index');
    $breadcrumbs->push(__('menus.backend.videos.category.create'), route('admin.video.category.create'));
});

Breadcrumbs::register('admin.video.category.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.video.category.index');
    $breadcrumbs->push(__('menus.backend.videos.category.edit'), route('admin.video.category.edit', $id));
});
