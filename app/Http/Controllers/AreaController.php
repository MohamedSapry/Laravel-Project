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
        $areas = Area::get();
        return response()->json($areas, 200);
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
            ], 400);
        }
        
        $area = new Area();
        $area->city = $request->city;
        $area->country = $request->country;        
        $area->save();

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
            $area = Area::where('id', $id)->get();
            return response()->json($area, 200);
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
            
            return response()->json($area, 201);
       }else{
        return response()->json([
            "message" => "Area not found"
          ], 400);
       }
    }

    /**
     * soft delete area
     * 
     * @return response()
     */
    public function deleteArea($id) {
        if(Area::where('id', $id)->exists()){
            $area = Area::find($id);
            $area->delete();
            return response()->json([
                "isSuccess" => true
            ]);
       }else{
        return response()->json([
            "isSuccess" => false
          ], 400);
       }
    }
}
