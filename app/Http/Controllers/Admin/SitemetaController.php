<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SiteMeta;

class SitemetaController extends Controller
{
    public  function SiteMeta(){
        $sitemeta = SiteMeta::first();
        return view('admin.site-info.add_info',compact('sitemeta'));
    }
   
    public function addProcess(Request $request){
        $sitemeta = SiteMeta::first();
        if($sitemeta){
            $sitemeta->header_text = $request->header_text;
            $sitemeta->support_email = $request->support_email;
            $sitemeta->support_phone = $request->support_phone;
            $sitemeta->facebook = $request->facebook;
            $sitemeta->instagram = $request->instagram;
            $sitemeta->linkedin = $request->linkedin;
            $sitemeta->twitter = $request->twitter;
            $sitemeta->footer_title = $request->footer_title;
            $sitemeta->footer_text = $request->footer_text;
            $sitemeta->update();
        }else{
            $sitemeta = new SiteMeta;
            $sitemeta->header_text = $request->header_text;
            $sitemeta->support_email = $request->support_email;
            $sitemeta->support_phone = $request->support_phone;
            $sitemeta->facebook = $request->facebook;
            $sitemeta->instagram = $request->instagram;
            $sitemeta->linkedin = $request->linkedin;
            $sitemeta->twitter = $request->twitter;
            $sitemeta->footer_title = $request->footer_title;
            $sitemeta->footer_text = $request->footer_text;
            $sitemeta->save();
        }
        return redirect()->back()->with('success','Successfully updated');
    }
}
