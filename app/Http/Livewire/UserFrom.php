<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Address;
use App\Models\Area;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserFrom extends Component
{   
    public $user_name, $user_id, $area_id, $city, $street_name, $building_number, $floor, $number_of_apartment, $country, $users, $areas;
    protected $rules = [
        'user_name' => 'required',
        'user_id' => 'required|integer',
        'area_id' => 'required|integer',
        'city' => 'required',
        'street_name' => 'required',
        'building_number' => 'required',
        'floor' => 'required|integer',
        'number_of_apartment' => 'required|integer'
    ];
    
    public function mount(){
        $this->users = [];
        $this->areas = [];
    }
    public function render()
    {
        
        
        // $name = '%' . $this->user_name . '%';
        // $this->users = User::where('name', 'like', $name)
        //              ->paginate(10);
                      
        return view('livewire.user-from')
                ->layout('layouts.userform');
    }

    
    public function listUsers(){
        $name = '%' . $this->user_name . '%';
        
        $this->users = User::where('name', 'like', $name)
                            ->limit(10)
                            ->get();
    }

    public function listAreas(){
        $city = '%' . $this->city . '%';

        $this->areas = Area::where('city', 'like', $city)
                      ->limit(10)
                      ->get();
    }

    public function clickName($user_name, $user_id){
        $this->user_name = $user_name;
        $this->user_id = $user_id;
        $this->users = [];
    }

    public function clickCity($city, $country, $area_id){
        $this->city = $city . ", " . $country;
        $this->area_id = $area_id;
        $this->areas = [];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
        $this->validate();

        $user_address = Address::where('user_id', $this->user_id)
                                ->update([
                                    'defult_address' => false
                                ]);
        $address = new Address;
        $address->user_id = $this->user_id;
        $address->area_id = $this->area_id;
        $address->street_name = $this->street_name;
        $address->building_number = $this->building_number;
        $address->floor = $this->floor;
        $address->number_of_apartment = $this->number_of_apartment;
        $address->defult_address = true;
        $address->last_use_at = Carbon::now();
        $address->save();
        dd("hi");
    }
    
}
