<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Area;
class Input extends Component
{
    
    public $input, $errormessage, $label, $fieldType, $search, $options, $selectedFieldEvent, $listOptionsEvent;
    protected function getListeners(){
        return [$this->selectedFieldEvent => 'selectClicked', 
                $this->listOptionsEvent => 'listOptions'
                ];
    }

    
    public function rules(){
        if($this->errormessage == "namefield"){
            return ['input' => 'required'];
        }else if($this->errormessage == "numericfield"){
            return ['input' => 'required|integer'];
        }
    }

    public function mount(){
        $this->options = [];
    }

    public function render()
    {
        return view('livewire.input');
    }
    
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function addedAttribute(){
        $this->emitUp('addedAttribute', $this->input, $this->fieldType);
    }

    public function listOptions($options){
        $this->options = $options;
    }


    public function clickOption($object){
        $this->emitup('clickOption', $object, $this->fieldType);
    }

    public function selectClicked($input){
        $this->input = $input;
        $this->options = [];
    }

}
