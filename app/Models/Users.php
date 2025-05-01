<?php

namespace App\Models;
use App\Models\Role;
use App\Models\SuperAdmin;
use App\Models\AdminGudang;
use App\Models\Kasir;
use App\Models\Pengunjung;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'avatar'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    // Memeriksa apakah pengguna memiliki peran tertentu
    public function hasRole($role)
    {
        return $this->roles->pluck('name')->contains($role);
    }
    public function kasir() {
        return $this->hasOne(Kasirs::class);
    }

    public function adminGudang() {
        return $this->hasOne(AdminGudangs::class);
    }

    public function pengunjung() {
        return $this->hasOne(Pengunjungs::class);
    }

    public function superAdmin() {
        return $this->hasOne(SuperAdmins::class);
    }
}
