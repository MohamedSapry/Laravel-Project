<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Area;
class Input extends Component
{
    
    public $input, $errormessage, $label, $users, $areas, $search;
    
    public function rules(){
        if($this->errormessage == "namefield"){
            return ['input' => 'required'];
        }else if($this->errormessage == "numericfield"){
            return ['input' => 'required|integer'];
        }
    }

    public function mount(){
        $this->users = [];
        $this->areas = [];
    }

    public function render()
    {
        return view('livewire.input');
    }
    
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function addedAttribute(){
        if($this->label == "UserName"){
            $this->listUsers();
        }else if($this->label == "City"){
            $this->listAreas();
        }
        $this->emitUp('addedAttribute', $this->input, $this->label);
    }

    public function clickName($name, $user_id){
        $this->emitUp('clickName', $name, $user_id);
        $this->input = $name;
        $this->users = [];
    }
    
    public function clickCity($city, $country, $area_id){
        $this->emitUp('clickCity', $area_id);
        $this->input = $city . ", " . $country;
        $this->areas = [];
    }
    public function listUsers(){
        $name = '%' . $this->input . '%';
        
        $this->users = User::where('name', 'like', $name)
                            ->limit(10)
                            ->get();
    }

    public function listAreas(){
        $city = '%' . $this->input . '%';

        $this->areas = Area::where('city', 'like', $city)
                      ->limit(10)
                      ->get();
    }

}
