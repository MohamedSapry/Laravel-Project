<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Address;
use App\Models\Area;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;
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
    
    protected $listeners = ['addedAttribute', 'clickOption'];

    public function addedAttribute($input, $label){
        if($label == "UserName"){
            $this->setUserName($input); 
            $this->listUsers($input);  
        }else if($label == "StreetName"){
            $this->setStreetName($input);
        }else if($label == "BuildingNumber"){
            $this->setBuildingNumber($input);
        }else if($label == "Floor"){
            $this->setFloor($input);
        }else if($label == "ApartmentNumber"){
            $this->setApartmentNumber($input);
        }else if($label == "City"){
            $this->setCity($input);
            $this->listAreas($input);
        }
    }


    public function setUserName($input){
        $this->user_name = $input;
    }

    public function setStreetName($input){
        $this->street_name = $input;
    }

    public function setBuildingNumber($input){
        $this->building_number = $input;
    }

    public function setFloor($input){
        $this->floor = $input;
    }

    public function setApartmentNumber($input){
        $this->number_of_apartment = $input;
    }

    public function setCity($input){
        $this->city = $input;
    }

    public function mount(){
        $this->users = [];
        $this->areas = [];
    }
    public function render()
    {
        
       return view('livewire.user-from')
                ->layout('layouts.userform');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function listAreas($input){
        $city = '%' . $input . '%';

        $this->areas = Area::where('city', 'like', $city)
                      ->limit(10)
                      ->get();
        $this->emit('city', $this->areas);
    }

    public function listUsers($input){
        $name = '%' . $input . '%';

        $this->users = User::where('name', 'like', $name)
                            ->limit(10)
                            ->get();
        $this->emit('user', $this->users);
    }

    public function clickOption($object, $label){
        if($label == "UserName"){
            $this->clickName($object['name'], $object['id']);
        }else if($label == "City"){
            $this->clickCity($object['city'], $object['country'], $object['id']);
        }
    }

    public function clickName($user_name, $user_id){
        $this->user_name = $user_name;
        $this->user_id = $user_id;
        $this->emit('selectuser', $this->user_name);
    }

    public function clickCity($city, $country, $area_id){
        $this->city = $city . ", " . $country;
        $this->area_id = $area_id;
        $this->emit('selectcity', $this->city);
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
        return redirect()->route('addresses');
    }
    
}
