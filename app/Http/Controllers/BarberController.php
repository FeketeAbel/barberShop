<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barber;
use Illuminate\Validation\ValidationException;

class BarberController extends Controller
{
    public function index() {
        $barber = Barber::all();
        return response()->json($barber, 200, ["Access-Control-Allow-Origin" => "*"], JSON_UNESCAPED_UNICODE);
    }

    public function store(Request $request) {
        try {
            $request->validate([
                "barber_name" => "required|string|max:255",
            ], [
                "required"=> "A(z) :attribute mezőt kötelező kitölteni!",
                "string"=> "A(z) :attribute mezőnek szöveg típusúnak kell lennie!",
                "max"=> "A(z) :attribute mező túl hosszú! Max: :max",
            ], [
                "barber_name" => "Barber neve",
            ]);
        } catch (ValidationException $e) {
            return response()->json(["success" => false, "uzenet" => $e->errors()], 400, ["Access-Control-Allow-Origin" => "*"], JSON_UNESCAPED_UNICODE);
        }

        $barber = Barber::create($request->all());
        return response()->json(["success" => true, "uzenet" => $barber->barber_name." sikeresen rögzítésre került"], 200, ["Access-Control-Allow-Origin" => "*"], JSON_UNESCAPED_UNICODE);
    }

    public function destroy(Request $request) {

    }
}
