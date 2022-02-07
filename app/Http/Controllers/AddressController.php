<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * listing all addresses
     * 
     * @return response()
     */
    public function getAlladdresses() {
        $addresses = Address::get();
        return response()->json($addresses, 200);
    }

    /**
     * create address
     * 
     * @return response()
     */
    public function createAddress(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'user_id' => 'bail|required', 
            'area_id' => 'bail|required', 
            'building_number' => 'bail|required',
            'street_name' => 'required',
            'floor' => 'required|integer',
            'number_of_apartment' => 'required|integer'
        ]);

        $address = new Address;
        $address->user_id = $request->user_id;
        $address->area_id = $request->area_id;
        $address->building_number = $request->building_number;
        $address->street_name = $request->street_name;
        $address->floor = $request->floor;
        $address->number_of_apartment = $request->number_of_apartment;
        $address->defult_address = $request->defult_address;
        $address->save();

        return response()->json($address, 201);
    
    }

    /**
     * list address by id
     * 
     * @return response()
     */
    public function getAddress($id) {
       if(Address::where('id', $id)->exists()){
            $address = Address::where('id', $id)->get();
            return response()->json($address, 200);
       }else{
        return response()->json([
            "message" => "Address not found"
          ], 404);
       }
    }

    /**
     * uppdate addresss data
     * 
     * @return response()
     */
    public function updateAddress(Request $request, $id) {
        if(Address::where('id', $id)->exists()){
            $address = Address::find($id);
            $validator = Validator::make($address->all(), [
                'user_id' => 'bail|required', //user_id, area_id in db validation
                'area_id' => 'bail|required', 
                'building_number' => 'bail|required',
                'street_name' => 'required',
                'floor' => 'required|integer|gte:0',
                'number_of_apartment' => 'required|integer|gte:0'
            ]);
            
            if($validator->fails()){
                return response()->json([
                    "message" => "data not valid"
                ], 400);
            }
            $address->user_id = $request->user_id;
            $address->area_id = $request->area_id;
            $address->building_number = $request->building_number;
            $address->street_name = $request->street_name;
            $address->floor = $request->floor;
            $address->number_of_apartment = $request->number_of_apartment;
            $address->defult_address = $request->defult_address;
            $address->save;

            return response()->json($address, 201);
       }else{
        return response()->json([
            "message" => "Address not found"
          ], 400);
       }
    }

    /**
     * soft delete address
     * 
     * @return response()
     */
    public function deleteAddress($id) {
        if(Address::where('id', $id)->exists()){
            $address = Address::find($id);
            $address->delete();
            return response()->json([
                "isSuccess" => true
            ]);
       }else{
        return response()->json([
            "message" => "Address not found"
          ], 400);
       }
    }
}
