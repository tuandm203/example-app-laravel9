<?php

namespace app\Components;

use App\Models\Menu;

class MenuRecusive {
    private $html;
    public function __construct()
    {
       // $this ->html =''; 
    }

     public function menuRecusiveAdd($parent_ID = 0, $subMark= ''){
         $data = Menu::where('parent_id',$parent_ID)->get();
        foreach($data as  $dataItem){
            $this->html .= '<option value= "'. $dataItem->id.'">' . $subMark.$dataItem ->name . '</option>';
            $this->menuRecusiveAdd($dataItem->id, $subMark.'--' );  
        }
        return $this->html;
     }    

     public function menuRecusiveEdit($parentIdMenuId,$parent_ID = 0, $subMark= ''){
        $data = Menu::where('parent_id',$parent_ID)->get();
       foreach($data as  $dataItem){
            if ($parentIdMenuId == $dataItem->id)
                $this->html .= '<option selected value= "'. $dataItem->id.'">' . $subMark.$dataItem ->name . '</option>';
            else
               $this->html .= '<option value= "'. $dataItem->id.'">' . $subMark.$dataItem ->name . '</option>';
            $this->menuRecusiveEdit($parentIdMenuId,$dataItem->id, $subMark.'--' );  
       }
       return $this->html;
    }    
}
