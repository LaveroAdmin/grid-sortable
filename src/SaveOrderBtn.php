<?php

namespace LaveroAdmin\Admin\GridSortable;

use LaveroAdmin\Admin\Grid\Tools\AbstractTool;

class SaveOrderBtn extends AbstractTool
{
    public function render()
    {
        $text = trans('admin.save_order') ?: __('Save order');

        return <<<HTML
<button type="button" class="btn btn-sm btn-primary grid-save-order-btn d-none">
    <i class="icon-save"></i><span class="d-none d-sm-inline">&nbsp;&nbsp;{$text}</span>
</button>
HTML;
    }
}
