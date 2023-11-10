<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    // public function downloadProcess(Request $request){
    //     // return $request->complete_task_id;
    //     $complete_task_id = $request->complete_task_id;
    //     $completedTask = CompletedTask::find($complete_task_id);
    //     $order_num = Order::find($completedTask->order_id)->value('order_num');
    //     $directory_name = "Order_".$order_num;
    //     $media = unserialize($completedTask->media_id);
        
    //     $media_in_response = array();

    //     if(!empty($media)){
            
    //         $filePathArr = array();
    //         $imagePaths  = array();
    //         if(is_array($media)){

    //             foreach($media as $m){
    //                 $media_data = Media::find($m);
    //                 $imagePaths[] = public_path($media_data->image_path);
    //             }

    //             // Create a temporary directory to store the copied images
    //             $tempDirectory = storage_path('temp');
    //             File::makeDirectory($tempDirectory);

    //             // Copy the images to the temporary directory
    //             foreach ($imagePaths as $imagePath) {
    //                 $imageName = pathinfo($imagePath, PATHINFO_BASENAME);
    //                 $newImagePath = $tempDirectory . '/' . $imageName;
    //                 File::copy($imagePath, $newImagePath);
    //             }

    //             // Create a zip file containing the copied images
    //             $zipFileName = $directory_name.'.zip';
    //             $zipFilePath = storage_path($zipFileName);

    //             $zip = new ZipArchive;
    //             if ($zip->open($zipFilePath, ZipArchive::CREATE) === true) {
    //                 foreach ($imagePaths as $imagePath) {
    //                     $imageName = pathinfo($imagePath, PATHINFO_BASENAME);
    //                     $newImagePath = $tempDirectory . '/' . $imageName;
    //                     $zip->addFile($newImagePath, $imageName);
    //                 }
    //                 $zip->close();
    //             }

    //             // Remove the temporary directory
    //             File::deleteDirectory($tempDirectory);

    //             // Create a downloadable response for the zip file
    //             return response()->download($zipFilePath, $zipFileName)->deleteFileAfterSend(true);
    //         }
    //     }else{
    //         return redirect()->back()->with('error','There is an error in system please talk with support');
    //     }
    //     return redirect()->back();
    // }
}
