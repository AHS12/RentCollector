<?php

namespace App\Http\Controllers\attachment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\document\AttachmentModel;

class AttachmentController extends Controller
{
    //
    /**
     * @name attachmentDeleteAjax
     * @role delete Attachment from the database with file
     * @param Request from array
     * @return json response
     *
     */
    public function attachmentDeleteAjax(Request $request)
    {
        $id = $request->id;
        $attachment = AttachmentModel::findOrFail($id);

        if (file::exists(public_path($attachment->attachment_path))) {
            file::delete(public_path($attachment->attachment_path));
            $attachment->delete();

            return response()->json("Success");
        } else {
            return response()->json(array('errors' => 'Something Went Wrong!'));
        }
    }


    /**
     * @name attachmentDownload
     * @isp download  attachment from database
     * @param Request from array
     * @return download response
     *
     */
    public function attachmentDownload(Request $request){
        $url = $request->url;
        $file_path = public_path($url);
        // dd($file_path);
        return response()->download($file_path);
    }
}
