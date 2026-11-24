<?php

namespace LaveroAdmin\Admin\GridSortable\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GridSortableController extends Controller
{
    public function sort(Request $request)
    {
        $sorts = $request->get('_sort');

        if (empty($sorts)) {
            return response()->json(['status' => false, 'message' => 'No sort data provided.']);
        }

        $sorts = collect($sorts)
            ->pluck('key')
            ->combine(
                collect($sorts)->pluck('sort')->sort()
            );

        $status = true;
        $message = trans('admin.save_succeeded');
        $modelClass = $request->get('_model');

        if (!$modelClass || !class_exists($modelClass) || !is_subclass_of($modelClass, \Illuminate\Database\Eloquent\Model::class)) {
            return response()->json(['status' => false, 'message' => 'Invalid model class.']);
        }

        try {
            /** @var \Illuminate\Database\Eloquent\Collection $models */
            $models = $modelClass::find($sorts->keys());

            foreach ($models as $model) {
                $column = data_get($model->sortable, 'order_column_name', 'order_column');

                $model->{$column} = $sorts->get($model->getKey());
                $model->save();
            }
        } catch (\Throwable $exception) {
            $status = false;
            $message = $exception->getMessage();
        }

        return response()->json(compact('status', 'message'));
    }
}
