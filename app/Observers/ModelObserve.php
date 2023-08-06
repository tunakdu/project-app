<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Auth;

class ModelObserve

{

    public function creating(Model $model){
        if(in_array('user_id',$model->getFillable())){
            $model->user_id = Auth::guard('api')->user()->id;
        }
    }
}

