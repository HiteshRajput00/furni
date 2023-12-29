<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLanguage extends Controller
{
    public function setLanguage($locale)
    {
        $supportedLocales = ['en', 'es'];
        if (in_array($locale, $supportedLocales)) {
            App::setLocale($locale);
        }

        return view('iin');
    }

    public function change(Request $req){
         // Read the existing JSON file
         $jsonFile = resource_path('lang/.json');
         $jsonData = File::get($jsonFile);
         $data = json_decode($jsonData, true);
 
         // Modify the data as needed
         $data['welcome'] = $req->input('welcome');
        //  $data['about'] = $req->input('about');
         // ... and so on
 
         // Write the modified data back to the JSON file
         $updatedData = json_encode($data);
         File::put($jsonFile, $updatedData);
 
         return response()->json(['message' => 'JSON file updated successfully']);
    }
}
