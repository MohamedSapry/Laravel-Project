<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class UserTableSelfImpl extends Component
{
    use WithPagination;
    public function render()
    {
        $addresses = Address::allowed(Auth::user())
                            ->join('users', 'users.id', '=', 'addresses.user_id')
                            ->join('areas', 'areas.id', '=', 'addresses.area_id')
                            ->select('*')
                            ->paginate(10);
            return view('livewire.user-table-self-impl',[
            'addresses' => $addresses
        ])->layout('layouts.usertabel');
    }
}
