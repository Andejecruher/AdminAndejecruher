<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    protected $users;
    public $search = '';
    public $searchResults = [];

    public function search()
    {
        if (!empty($this->search)) {
            $this->searchResults = User::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->get();
        } else {
            $this->searchResults = [];
        }
    }

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        if (!empty($this->search)) {
            return view('livewire.users', ['users' => $this->searchResults]);
        } else {
            return view('livewire.users', ['users' => $this->users]);
        }
    }
}
