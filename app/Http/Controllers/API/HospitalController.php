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
        return ResponseFormatter::success(
            $hospitals,
            'Data rumah sakit berhasil diambil'
        );
    }
}
