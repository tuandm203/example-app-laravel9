<?php
 namespace App\Traits;
 use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

 trait Storageimage{
    public function storageTraitUpload($request,$filedname,$fodername){
        if ($request->hasFile($filedname)) {
        $file = $request->$filedname;
        $filenameOrigin = $file->getClientOriginalName();
        $filenameHash= str::random('20').'.'.$file->getClientOriginalExtension();
        $filepath = $request->file($filedname)->storeAs('public/'.$fodername.'/'.auth()->id(),$filenameHash);
        $dataUploadTrait = [
            'file_name' =>$filenameOrigin,
            'file_path' =>  Storage::url($filepath)
        ];
        return $dataUploadTrait;
        }
        return null;
    }

    public function storageTraitUploadMutile($file,$fodername){
        $filenameOrigin = $file->getClientOriginalName();
        $filenameHash= str::random('20').'.'.$file->getClientOriginalExtension();
        $filepath = $file->storeAs('public/'.$fodername.'/'.auth()->id(),$filenameHash);
        $dataUploadTrait = [
            'file_name' =>$filenameOrigin,
            'file_path' =>  Storage::url($filepath)
        ];
        return $dataUploadTrait;
        
        return null;
    }
 }
