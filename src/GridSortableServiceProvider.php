<?php

namespace LaveroAdmin\Admin\GridSortable;

use Illuminate\Support\ServiceProvider;

class GridSortableServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(?GridSortable $extension = null)
    {
        $extension = $extension ?: new GridSortable();

        if (!GridSortable::boot()) {
            return;
        }

        GridSortable::routes(__DIR__.'/../routes/web.php');

        $extension->install();
    }
}
