<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjungs extends Model
{
    use HasFactory;

    protected $table = 'pengunjungs';

    protected $primaryKey = 'user_id';
    public $incrementing = false;  // Karena primary key menggunakan user_id yang bukan auto increment
    protected $fillable = ['user_id', 'customer_number', 'phone_number', 'address'];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function assignRole()
    {
        $user = $this->user;
        $role = Role::where('name', 'pengunjung')->first();
        $user->roles()->attach($role);
    }
}
