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

        //dd($request->all());
        $userName = Auth::user()->name;
        $userId = Auth::user()->id;
        $defaultStatus = 0;


        $date = $request->rent_date;
        $rentMonth = date("F", strtotime($date));

        //gettings attributes
        $attributeNames = array(
            'user_id'              => $userId,
            'aprt_id'              => $request->apertment,
            'date'                 => $request->rent_date,
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
                'date'              => 'required|date|unique:rents,date,NULL,id,user_id,' . $userId,
                'original_rent'     => 'required|numeric|min:1',
                'rent'              => 'required|numeric|min:1',
                'due'               => 'required|numeric|min:1',
                'expense'           => 'required|numeric|min:1',

            ],
            [
                'date.unique'      => 'Rent Of this month is already Exists',
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
            'advance'              => $request->advance_rent,
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
                'date'              => 'required|date|unique:rents,date,' . $id . ',id,user_id,' . $userId,
                'original_rent'     => 'required|numeric|min:1',
                'rent'              => 'required|numeric|min:1',
                'due'               => 'required|numeric|min:1',
                'expense'           => 'required|numeric|min:1',

            ],
            [
                'date.unique'      => 'Rent Of this month is already Exists',
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
        try {
            $rent->update(['soft_delete' => 1]);
            return response()->json("Success");
        } catch (\Exception $exception) {
            return response()->json(array('errors' => $exception->getMessage()));
        }
    }



    //end apertment part



    //shop part

    //end shop part

}
