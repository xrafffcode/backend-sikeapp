<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Hospital;


class HospitalController extends Controller
{
    public function all()
    {
        $hospitals = Hospital::all();
        $hospitals->map(function ($hospital) {
            $hospital->image = asset('storage/' . $hospital->image);
            return $hospital;
        });
        return response()->json($hospitals);
    }
}
