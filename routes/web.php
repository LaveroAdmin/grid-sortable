<?php

use Illuminate\Support\Facades\Route;

Route::post('_grid-sortable_', '\LaveroAdmin\Admin\GridSortable\Controllers\GridSortableController@sort')->name('lavero-admin-grid-sortable');
