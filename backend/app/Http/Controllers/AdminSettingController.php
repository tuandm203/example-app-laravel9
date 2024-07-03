<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Slider;
use App\Models\setting;
use App\Models\settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\SettingAddRequest;
use App\Http\Requests\SettingAddRequest1;

class AdminSettingController extends Controller
{
    private $setting;
    public function __construct(settings $setting)
    {
        $this->setting=$setting;
    }    

    public function index()
    {
        $settings = $this->setting->latest()->paginate(5);
        return view('admin.setting.index',compact('settings'));
    }
    public function create(){
        return view('admin.setting.add');
    }

    public function store(SettingAddRequest $request){
        $this->setting->create([
            'config_key'=>$request->config_key,
            'config_value'=>$request->config_value,
            'type'=>$request->type,
        ]);
        return redirect()->route('settings.index');
    }

    public function edit($id)
    {   
        $setting = $this->setting->find($id);
        return view('admin.setting.edit',compact('setting'));
    }

    public function update($id,SettingAddRequest1 $request)
    {
        $this->setting->find($id)->update([
            'config_key'=>$request->config_key,
            'config_value'=>$request->config_value,
        ]);
        return redirect()->route('settings.index');
    } 

    public function delete($id)
    {
        try{
            $this->setting->find($id)->delete();
            return response()->json([
                'code'=>200,
                'mesage'=> 'Delete success'
            ],200);
    } catch(\Exception $exception)
    {
        Log::error('Lỗi: '. $exception->getMessage() . '----Line:'.$exception->getLine());
        $this->setting->find($id)->delete();
        return response()->json([
            'code'=>500,
            'mesage'=> 'Delete fail'
        ],500);
    }
    }
}
