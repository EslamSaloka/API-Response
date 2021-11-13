<?php

if (!function_exists('api_model_set_paginate')) {
    function api_model_set_paginate($model)
    {
        $pagnation['total'] = $model->total();
        $pagnation['lastPage'] = $model->lastPage();
        $pagnation['perPage'] = $model->perPage();
        $pagnation['currentPage'] = $model->currentPage();
        return $pagnation;
    }
}