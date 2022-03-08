<?php

namespace App\Http\Controllers;

use App\Models\Appartement;


class AppartementController extends Controller
{
    public function all()
    {
        $properties = response()
            ->json(Appartement::all());
        return $properties;
    }

    public function detail($id)
    {
        $properties =  response()
            ->json(Appartement::find($id));
        return $properties;
    }

    public function add()
    {
        $properties = response()
        ->json(Appartement::all());
                return Appartement::create([
                    'title' => $properties['title'],
                    'description' => $properties['description'],
                ]);
      
    }

    public function modify($id)

    {
        $properties =  response()
        ->json(Appartement::find($id));
        return $properties;
    }

    public function delete($id)
    {
        $properties =  response()
        ->json(Appartement::create($id));
        $properties->delete();
        return response()->json(null);
    }
}
