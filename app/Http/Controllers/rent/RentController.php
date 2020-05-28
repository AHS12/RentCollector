<?php

namespace App\Http\Controllers\rent;

use App\home\ApertmentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\rent\RentModel;


class RentController extends Controller
{

    //apertment part//

    /**
     * @name rentApertmentView
     * @role all rent of an apertment view
     * @param 
     * @return compact array with view
     *
     */
    public function rentApertmentView()
    {
        $userId = Auth::user()->id;
        $rents = RentModel::where('soft_delete', 0)->where('user_id', $userId)->get();
        $apertments = ApertmentModel::where('soft_delete', 0)->where('user_id', $userId)->get();
        $data = [
            'rents'      => $rents,
            'apertments' => $apertments
        ];
        return view('rent.home.rents', $data);
    }

    /**
     * @name rentApertmentAjaxLoad
     * @role all rent of an apertments view ajax load
     * @param 
     * @return compact array with view
     *
     */
    public function rentApertmentAjaxLoad()
    {
        $userId = Auth::user()->id;
        $rents = RentModel::where('soft_delete', 0)->where('user_id', $userId)->get();
        $data = [
            'rents'      => $rents,
        ];
        return view('rent.home.ajaxLoad.rentAjaxLoad', $data);
    }



    /**
     * @name rentApertmentDetailsView
     * @role a rent of an apertment Details view
     * @param Request from array
     * @return compact array with view
     *
     */
    public function rentApertmentDetailsView(Request $request)
    {
        $id = $request->id;
        $userId = Auth::user()->id;
        if (!RentModel::where('id', $id)->exists()) abort(404);
        if (!RentModel::where('id', $id)->where('user_id', $userId)->exists()) abort(401);
        
        $apertments = ApertmentModel::where('soft_delete', 0)->where('user_id', $userId)->get();
        $rent = RentModel::where('id', $id)->where('user_id', $userId)->with('apertment')->first();
        //dd($rent);
        $data = [
            'rent'      => $rent,
            'apertments' => $apertments
        ];
        return view('rent.home.rentDetails', $data);
    }

    /**
     * @name getRentApertmentDetails
     * @role fetch Rent of an Apertment record from the database
     * @param Request from array
     * @return json response
     *
     */
    public function getRentApertmentDetails(Request $request)
    {
        $id = decrypt($request->id);
        if (!RentModel::where('soft_delete', 0)->where('id', $id)->exists()) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $rent = RentModel::where('soft_delete', 0)->where('id', $id)->with(['apertment' => function ($q) {
            $q->where('soft_delete', 0);
        }])->first();

        return response()->json($rent, 200);
    }

    /**
     * @name rentApertmentInsertAjax
     * @role insert rent of an Apertment record into the database
     * @param Request from array
     * @return json response
     *
     */

    public function rentApertmentInsertAjax(Request $request)
    {

        // dd($request->all());
        $userName = Auth::user()->name;
        $userId = Auth::user()->id;
        $defaultStatus = 0;


        $date = date("Y-m-d", strtotime($request->rent_date));
        $rentMonth = date("F", strtotime($date));

        // dd($date);
        //gettings attributes
        $attributeNames = array(
            'user_id'              => $userId,
            'aprt_id'              => $request->apertment,
            'date'                 => $date,
            'month'                => $rentMonth,
            'original_rent'        => $request->original_rent,
            'rent'                 => $request->collected_rent,
            // 'advance'              => $request->advance_rent,
            'due'                  => $request->due_rent,
            'expense'              => $request->expense,
            'created_by'           => $userName,
            'updated_by'           => $userName,
            'status'               => $defaultStatus,
            'soft_delete'          => $defaultStatus

        );

        //return dd($attributeNames);

        //validating the attributes
        $validator = Validator::make(
            $attributeNames,
            [
                'aprt_id'           => 'required|integer',
                'date'              => 'required|date|unique:rents,date,NULL,id,user_id,' . $userId . ',aprt_id,' . $request->apertment.',deleted_at,NULL',
                'month'              => 'required|unique:rents,month,NULL,id,user_id,' . $userId . ',aprt_id,' . $request->apertment.',deleted_at,NULL',
                'original_rent'     => 'required|numeric|min:1',
                'rent'              => 'required|numeric|min:0',
                'due'               => 'required|numeric|min:0',
                'expense'           => 'required|numeric|min:0',

            ],
            [
                'date.unique'       => 'Rent Of this month is already Exists',
                'month.unique'      => 'Rent Of this month is already Exists',
            ]
        );

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

            //code...
            RentModel::create($attributeNames);
            return response()->json("Success");
        }
    }

    /**
     * @name rentApertmentUpdatetAjax
     * @role update rent of an Apertment record into the database
     * @param Request from array
     * @return json response
     *
     */

    public function rentApertmentUpdatetAjax(Request $request)
    {
        $id = $request->id;
        $rent = RentModel::findOrFail($id);
        //dd($request->all());
        $userName = Auth::user()->name;
        $userId = Auth::user()->id;
        $defaultStatus = 0;


        $date = $request->rent_date;
        $rentMonth = date("F", strtotime($date));

        //gettings attributes
        $attributeNames = array(
            'aprt_id'              => $request->apertment,
            'date'                 => $request->rent_date,
            'month'                => $rentMonth,
            'original_rent'        => $request->original_rent,
            'rent'                 => $request->collected_rent,
            // 'advance'              => $request->advance_rent,
            'due'                  => $request->due_rent,
            'expense'              => $request->expense,
            'updated_by'           => $userName,

        );

        //return dd($attributeNames);

        //validating the attributes
        $validator = Validator::make(
            $attributeNames,
            [
                'aprt_id'           => 'required|integer',
                'date'              => 'required|date|unique:rents,date,' . $id . ',id,user_id,' . $userId . ',aprt_id,' . $request->apertment.',deleted_at,NULL',
                'month'             => 'required|unique:rents,month,' . $id . ',id,user_id,' . $userId . ',aprt_id,' . $request->apertment.',deleted_at,NULL',
                'original_rent'     => 'required|numeric|min:1',
                'rent'              => 'required|numeric|min:0',
                'due'               => 'required|numeric|min:0',
                'expense'           => 'required|numeric|min:0',

            ],
            [
                'date.unique'       => 'Rent Of this month is already Exists',
                'month.unique'      => 'Rent Of this month is already Exists',
            ]
        );

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

            //code...
            $rent->update($attributeNames);
            return response()->json("Success");
        }
    }


    /**
     * @name rentApertmentDeleteAjax
     * @role soft delete rent of an Apertment from the database
     * @param Request from array
     * @return json response
     *
     */
    public function rentApertmentDeleteAjax(Request $request)
    {
        $id = decrypt($request->id);
        $rent = RentModel::findOrFail($id);
        $deleteResponse = $rent->delete();
        if ($deleteResponse) {
            return response()->json("Success");
        } else {
            return response()->json(array('errors' => "Something Went Wrong"));
        }
    }



    //end apertment part



    //shop part

    //end shop part

}
