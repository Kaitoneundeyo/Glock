<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasirs extends Model
{
    use HasFactory;

    protected $table = 'kasirs';

    protected $primaryKey = 'user_id';
    public $incrementing = false;  // Karena primary key menggunakan user_id yang bukan auto increment
    protected $fillable = ['user_id', 'outlet_code', 'employee_number'];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function assignRole()
    {
        $user = $this->user;
        $role = Role::where('name', 'kasir')->first();
        $user->roles()->attach($role);
    }
}
