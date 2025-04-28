<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UtamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        return view('dashboard');
    }
}
