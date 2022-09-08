<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    public function all()
    {
        $drugs = Drug::with('category')->get();
        return response()->json($drugs);
    }
}
