<?php

namespace App\Http\Controllers;
use App\Models\Appartement;
use Illuminate\Http\Request;

class AppartementController extends Controller
{
    public function all() {
        $properties = response()
            ->json(Appartement::all());
        return $properties;
    }

    public function detail($id) {
        $properties =  response()
            ->json(Appartement::find($id));
        return $properties;
    }
}
