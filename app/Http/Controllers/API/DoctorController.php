<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Helpers\ResponseFormatter;

class DoctorController extends Controller
{
    public function all()
    {
        $doctors = Doctor::with('category', 'hospital')->get();
        return response()->json($doctors);
    }
}
