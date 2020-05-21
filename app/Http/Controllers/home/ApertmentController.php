<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\home\ApertmentModel;
use App\document\AttachmentModel;
use Illuminate\Support\Facades\DB;

class ApertmentController extends Controller
{
    //
    /**
     * @name apertmentView
     * @role all apertments view
     * @param 
     * @return compact array with view
     *
     */
    public function apertmentView()
    {
        $userId = Auth::user()->id;
        $apertments = ApertmentModel::where('soft_delete', 0)->where('user_id', $userId)->with('attachments')->get();
        $data = [
            'apertments' => $apertments
        ];
        return view('home.apertments', $data);
    }


    /**
     * @name apertmentDetailsView
     * @role an apertments details view
     * @param Request form array
     * @return compact array with view
     *
     */
    public function apertmentDetailsView(Request $request){
        $id = $request->id;
        $userId = Auth::user()->id;
        if (ApertmentModel::where('soft_delete', 0)->where('id', $id)->exists()) {

            $apertment = ApertmentModel::where('soft_delete', 0)->where('id', $id)->with(['user','attachments' => function ($q) {
                $q->where('soft_delete', 0);
            }])->first();
            if ($userId == $apertment->user_id) {
                $data = [
                    'apertment' => $apertment
                ];
                return view('home.apertmentDetails',$data);
            } else {
                abort(401);
            }
            
        } else {
            abort(404);
        }
        
    }

    /**
     * @name getApertmentDetails
     * @role fetch Apertment record from the database
     * @param Request from array
     * @return json response
     *
     */
    public function getApertmentDetails(Request $request)
    {

        $id = decrypt($request->id);
        $apertment = ApertmentModel::where('soft_delete', 0)->where('id', $id)->with(['attachments' => function ($q) {
            $q->where('soft_delete', 0);
        }])->first();

        $attachments = [];
        foreach ($apertment->attachments as $attachment) {
            $attachmentId = $attachment->id;
            $attachmentName = str_limit(substr($attachment->attachment_path,15),30);
            $attachmentPath = asset($attachment->attachment_path);

            array_push($attachments,array("id" => $attachmentId,"name"=>$attachmentName,"path"=>$attachmentPath));
        }

        $data = [
            'apertment' => $apertment,
            'attachments' => $attachments
        ];

        return response()->json($data, 200);
    }


    /**
     * @name apertmentInsertAjax
     * @role insert Apertment record into the database
     * @param Request from array
     * @return json response
     *
     */

    public function apertmentInsertAjax(Request $request)
    {

        //dd($request->all());
        $userName = Auth::user()->name;
        $userId = Auth::user()->id;
        $defaultStatus = 0;

        //gettings attributes
        $attributeNames = array(
            'user_id'                           => $userId,
            'name'                              => $request->name,
            'address'                           => $request->address,
            'conecrn_person'                    => $request->concern_person,
            'conecrn_email'                     => $request->concern_email,
            'conecrn_phone'                     => $request->concern_phone,
            'conecrn_nid_birth_passport'        => $request->concern_nid_birth,
            'created_by'                        => $userName,
            'updated_by'                        => $userName,
            'status'                            => $defaultStatus,
            'soft_delete'                       => $defaultStatus

        );

        //return dd($attributeNames);

        //validating the attributes
        $validator = Validator::make(
            $attributeNames,
            [
                'name'                      => 'required|min:3|unique:apertments,name,NULL,id,user_id,'.$userId,
                'address'                   => 'required|min:5',
                'conecrn_person'            => 'required|min:3',
                'conecrn_email'             => 'required|unique:apertments|email',
                'conecrn_phone'             => 'required|unique:apertments|numeric|digits:11',
                'conecrn_nid_birth_passport' => 'required|unique:apertments|min:9',

            ],
            [
                'name.unique' => 'The Apertment name has already been taken.',
                'conecrn_phone.max' => 'Concern Phone must be 11 digit.',
                'conecrn_nid_birth_passport.required' => 'Please Enter Valid NID/BIRTH CERTIFICATE/PASSPORT No!',
                'conecrn_nid_birth_passport.min' => 'NID/BIRTH CERTIFICATE/PASSPORT No must be atleast 9 digit!',
                'conecrn_nid_birth_passport.unique' => 'NID/BIRTH CERTIFICATE/PASSPORT No has already been taken.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

            DB::beginTransaction();
            try {
                //code...
                $apertment =  ApertmentModel::create($attributeNames);

                //inserting attachments
                if ($request->hasFile('attachment')) :
                    foreach ($request->file('attachment') as $file) {
                        $name = $file->getClientOriginalName();
                        $EXT  = $file->getClientOriginalExtension();
                        $imageFileName = base64_encode($name);
                        $imageFileName = $imageFileName . time() . "." . $EXT;
                        $attachment_path = 'uploads/images/' . $imageFileName;
                        $file->move('uploads/images', $imageFileName);


                        $attachment = new AttachmentModel();
                        $attachment->aprt_id = $apertment->id;
                        $attachment->attachment_path = $attachment_path;
                        $attachment->created_by = $userName;
                        $attachment->updated_by = $userName;
                        $attachment->status = $defaultStatus;
                        $attachment->soft_delete = $defaultStatus;
                        $attachment->save();
                    }
                endif;

                // dd($attachment_path);
                DB::commit();
                return response()->json("Success");
            } catch (\Exception $exception) {
                //throw $th;
                DB::rollback();
                return response()->json(array('dbErrors' => $exception->getMessage()));
            }
        }
    }

    /**
     * @name apertmentUpdatetAjax
     * @role update Apertment record into the database
     * @param Request from array
     * @return json response
     *
     */

    public function apertmentUpdatetAjax(Request $request)
    {

        $id = $request->id;
        $userName = Auth::user()->name;
        $userId = Auth::user()->id;
        $defaultStatus = 0;

        $apertment = ApertmentModel::findOrFail($id);


        $attributeNames = array(

            'name'                              => $request->name,
            'address'                           => $request->address,
            'conecrn_person'                    => $request->concern_person,
            'conecrn_email'                     => $request->concern_email,
            'conecrn_phone'                     => $request->concern_phone,
            'conecrn_nid_birth_passport'        => $request->concern_nid_birth,
            'updated_by'                        => $userName,

        );

        $validator = Validator::make(
            $attributeNames,
            [
                'name'                      => "required|min:3|unique:apertments,name,{$id},id,user_id,{$userId}",
                'address'                   => "required|min:5",
                'conecrn_person'            => "required|min:3",
                'conecrn_email'             => "required|email|unique:apertments,conecrn_email,{$id}",
                'conecrn_phone'             => "required|numeric|digits:11|unique:apertments,conecrn_phone,{$id}",
                'conecrn_nid_birth_passport' => "required|min:9|unique:apertments,conecrn_nid_birth_passport,{$id}",

            ],
            [
                'name.unique' => 'The Apertment name has already been taken.',
                'conecrn_phone.max' => 'Concern Phone must be 11 digit.',
                'conecrn_nid_birth_passport.required' => 'Please Enter Valid NID/BIRTH CERTIFICATE/PASSPORT No!',
                'conecrn_nid_birth_passport.min' => 'NID/BIRTH CERTIFICATE/PASSPORT No must be atleast 9 digit!',
                'conecrn_nid_birth_passport.unique' => 'NID/BIRTH CERTIFICATE/PASSPORT No has already been taken.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

            DB::beginTransaction();
            try {
                //code...
                $apertment->update($attributeNames);

                //inserting attachments
                if ($request->hasFile('attachment')) :
                    foreach ($request->file('attachment') as $file) {
                        $name = $file->getClientOriginalName();
                        $EXT  = $file->getClientOriginalExtension();
                        $imageFileName = base64_encode($name);
                        $imageFileName = $imageFileName . time() . "." . $EXT;
                        $attachment_path = 'uploads/images/' . $imageFileName;
                        $file->move('uploads/images', $imageFileName);


                        $attachment = new AttachmentModel();
                        $attachment->aprt_id = $apertment->id;
                        $attachment->attachment_path = $attachment_path;
                        $attachment->created_by = $userName;
                        $attachment->updated_by = $userName;
                        $attachment->status = $defaultStatus;
                        $attachment->soft_delete = $defaultStatus;
                        $attachment->save();
                    }
                endif;

                // dd($attachment_path);
                DB::commit();
                return response()->json("Success");
            } catch (\Exception $exception) {
                //throw $th;
                DB::rollback();
                return response()->json(array('dbErrors' => $exception->getMessage()));
            }
        }
    }



    /**
     * @name apertmentDeleteAjax
     * @role soft delete Apertment and associate record from the database
     * @param Request from array
     * @return json response
     *
     */
    public function apertmentDeleteAjax(Request $request)
    {
        $id = decrypt($request->id);
        $apertment = ApertmentModel::findOrFail($id);
        DB::beginTransaction();
        try {


            $apertment->update(['soft_delete' => 1]);
            AttachmentModel::where('aprt_id', $id)->update(['soft_delete' => 1]);


            DB::commit();
            return response()->json("Success");
        } catch (\Exception $exception) {
            DB::rollback();
            return response()->json(array('errors' => $exception->getMessage()));
        }
    }
}
