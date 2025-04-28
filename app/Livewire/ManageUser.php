<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManageUser extends Component
{
    public $name, $email, $password;
    public $users;

    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $this->users = User::latest()->get();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Kosongkan input setelah berhasil
        $this->reset(['name', 'email', 'password']);

        // Refresh list users
        $this->loadUsers();

        // SweetAlert success
        $this->dispatch('user-added', [
            'message' => 'User berhasil ditambahkan!'
        ]);
    }

    public function render()
    {
        return view('livewire.manage-user');
    }
}
