<?php

// app/Http/Controllers/AtendenteController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AtendenteController extends Controller
{
    public function index()
    {
        return view('atendente');
    }
}
