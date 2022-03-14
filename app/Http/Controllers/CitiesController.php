<?php

namespace App\Http\Controllers;

use App\Models\{ City, State };
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function fetchState(Request $request)
    {
        $data['states'] = State::get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
}
