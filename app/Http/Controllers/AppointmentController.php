<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index() {
        $appointment = Appointment::all();
        return response()->json($appointment, 200, ["Access-Control-Allow-Origin" => "*"], JSON_UNESCAPED_UNICODE);
    }

    public function store(Request $request) {
        
    }

    public function destroy(Request $request) {

    }
}
