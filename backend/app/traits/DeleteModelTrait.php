<?php
 namespace App\Traits;

use Illuminate\Support\Facades\Log;

 /**
  * 
  */
 trait DeleteModelTrait
 {
    public function deleteModelTrait($id,$model)
    {
        try{
            $model->find($id)->delete();
            return response()->json([
                'code'=>200,
                'mesage'=> 'Delete success'
            ],200);
              } catch(\Exception $exception)
            {
              Log::error('Lỗi: '. $exception->getMessage() . '----Line:'.$exception->getLine());
              $model->find($id)->delete();
            return response()->json([
            'code'=>500,
            'mesage'=> 'Delete fail'
               ],500);
         }
    }

 }
 