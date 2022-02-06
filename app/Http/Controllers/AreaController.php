<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    

    /**
     * listing all areas
     * 
     * @return response()
     */
    public function getAllAreas() {
        $areas = Area::get()->toJson(JSON_PRETTY_PRINT);
        return response($areas, 200);
    }

    /**
     * create area
     * 
     * @return response()
     */
    public function createArea(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'city' => 'required|unique:areas',
            'country' => 'required|unique:areas'
        ]);

        if($validator->fails()){
            return response()->json([
                "message" => "data not valid"
            ], 404);
        }
        
        $area = new Area;
        $area->city = $request->city;
        $area->country = $request->country;        

        return response()->json([
            "message" => "Area record created"
        ], 201);
    
    }

    /**
     * get area by id
     * 
     * @return response()
     */
    public function getArea($id) {
       if(Area::where('id', $id)->exists()){
            $area = Area::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($area, 200);
       }else{
        return response()->json([
            "message" => "Area not found"
          ], 404);
       }
    }

    /**
     * update area data
     * 
     * @return response()
     */
    public function updateArea(Request $request, $id) {
        if(Area::where('id', $id)->exists()){
            $area = Area::find($id);
            Validator::make($area->all(), [
                'city' => 'required|unique:areas',
                'country' => 'required|unique:areas'
            ]);

            if($validator->fails()){
                return response()->json([
                    "message" => "data not valid"
                ], 404);
            }

            $area->city = $request->city;
            $area->country = $request->country;  
            $area->save;
       }else{
        return response()->json([
            "message" => "Area not found"
          ], 404);
       }
    }

    /**
     * soft delete area
     * 
     * 
     */
    public function deleteArea($id) {
        if(Area::where('id', $id)->exists()){
            $area = Area::find($id);
            $area->delete();
            return response(['deleted_at' => $area->deleted_at], 200);
       }else{
        return response()->json([
            "message" => "Area not found"
          ], 404);
       }
    }
}
