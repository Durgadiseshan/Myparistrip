<?php

namespace App\Livewire\admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTable extends Component
{
    public $users, $name, $email, $password, $user_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->users = User::all();
       // echo "<pre>"; print_r($this->users); die;
        return view('livewire.admin.users-table')->layout('layouts.admin');
       // return view('livewire.users-table')->layout('layouts.app');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->user_id = null;
    }
    
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'password' => 'required|min:6',
        ]);
    
        User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', $this->user_id ? 'User updated.' : 'User created.');

        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $user = User::find($id);
        if ($user) {
            $this->user_id = $id;
            $this->name = $user->name;
            $this->email = $user->email;
            // Do not load the password for editing as it's hashed
            $this->openModal();
        } else {
            // If no user is found, flash a session error message
            session()->flash('error', 'The user does not exist.');
        }
    }
    
    public function delete($id)
    {
        if ($user = User::find($id)) {
            $user->delete();
            session()->flash('message', 'User deleted.');
        } else {
            session()->flash('error', 'The user does not exist.');
        }
    }
}