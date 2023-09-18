<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    protected $users;


    public function mount(){
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.users', [ 'users' => $this->users]);
    }
}
