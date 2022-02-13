<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class UserTableSelfImpl extends Component
{
    use WithPagination;
    public function render()
    {
        $addresses = DB::table('addresses')
                            ->join('users', 'users.id', '=', 'addresses.user_id')
                            ->join('areas', 'areas.id', '=', 'addresses.area_id')
                            ->select('*')
                            ->paginate(10);
            return view('livewire.user-table-self-impl',[
            'addresses' => $addresses
        ]);
    }
}
