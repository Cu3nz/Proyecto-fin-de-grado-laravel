<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class TablaUsers extends Component
{
    public function render()
    {
        $User = User::orderBy('id', 'desc')->paginate(2);

        return view('livewire.tabla-users' , compact('User'));
    }
}
