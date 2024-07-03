<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    public function indexPermission(){
        return view('admin.permission.add');
    }
    public function store(Request $request)
    {
      
        $permission = Permission::create([
            'name' =>$request->module_parent ,
            'display_name' =>$request->module_parent ,
            'parent_id' => 0,
            'key_code' => NULL
        ]);
        foreach ($request->module_chilrent as $value){
        Permission::create([
            'name'=> $value,
            'display_name'=>$value,
            'parent_id' => $permission ->id,
            'key_code' => $request->module_parent.'_'.$value
        ]);
        }
    }
}
