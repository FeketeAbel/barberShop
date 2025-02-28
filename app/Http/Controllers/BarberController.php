<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barber;

class BarberController extends Controller
{
    public function index() {
        $barber = Barber::all();
        return response()->json($barber, 200, ["Access-Control-Allow-Origin" => "*"], JSON_UNESCAPED_UNICODE);
    }

    public function store(Request $request) {

    }

    public function destroy(Request $request) {

    }
}
