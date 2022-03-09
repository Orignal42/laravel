<?php

namespace App\Http\Controllers;

use App\Models\Appartement;

use OpenApi\Attributes as OA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


    /**
     * Ajouter un nouvel appartement.
     *
     * @OA\Put(
     *     path="/property/add",
     *     tags={"appartement"},
     *     operationId="addAppartement",
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied"
     *     ),
     *
     * 
     *     @OA\Parameter(
     *         name="title",
     *         in="path",
     *         description="Appartement title to add",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="varchar255"
     *         ),
     *     ),
     *         @OA\Parameter(
     *         name="description",
     *         in="path",
     *         description="Appartement description to add",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="varchar255"
     *         ),
     *     ),
     *         @OA\Parameter(
     *         name="size",
     *         in="path",
     *         description="Appartement size to add",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *            @OA\Parameter(
     *         name="floor",
     *         in="path",
     *         description="Appartement floor to add",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *         @OA\Parameter(
     *         name="image",
     *         in="path",
     *         description="Appartement image to add",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="varchar255"
     *         ),
     *     ),
     *          @OA\Parameter(
     *         name="room",
     *         in="path",
     *         description="Appartement room to add",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *               @OA\Parameter(
     *         name="price",
     *         in="path",
     *         description="Appartement price to add",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *      *         @OA\Parameter(
     *         name="address",
     *         in="path",
     *         description="Appartement address to add",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="varchar255"
     *         ),
     *     ),
     *         @OA\Parameter(
     *         name="postcode",
     *         in="path",
     *         description="Appartement postcode to add",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *            @OA\Parameter(
     *         name="city",
     *         in="path",
     *         description="Appartement city to add",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="varchar255"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Appartement non trouver"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Validation exception"
     *     ),
     *    
     * )
     */
    public function add(Request $request)
    {
        $this->validate($request, [

            'title' => 'required|max:100',
            'description' => 'required|max:255',
            'size' => 'required|min:2',
            'floor' => 'required|min:0',
            'image' => 'required|max:255',
            'room' => 'required|min:1',
            'price' => 'required|min:2',
            'address' => 'required|max:255',
            'postcode' => 'required|min:1',
            'city' => 'required|max:255',

        ]);


        $appartement = Appartement::create([
            'title' => $request->title,
            'description' => $request->description,
            'size' => $request->size,
            'floor' => $request->floor,
            'image' => $request->image,
            'room' => $request->room,
            'price' => $request->price,
            'address' => $request->address,
            'postcode' => $request->postcode,
            'city' => $request->city,

        ]);

        // On retourne les informations du nouvel appartement en JSON
        return response()->json($appartement, 201);
    }


    /**
     * Modifier un appartement existant.
     *
     * @OA\Post(
     *     path="/property/modify/{id}",
     *     tags={"appartement"},
     *     operationId="updateAppartement",
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied"
     *     ),
     * 
     *     @OA\Parameter(
     *         name="title",
     *         in="path",
     *         description="Appartement title to update",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="varchar255"
     *         ),
     *     ),
     *         @OA\Parameter(
     *         name="description",
     *         in="path",
     *         description="Appartement description to update",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="varchar255"
     *         ),
     *     ),
     *         @OA\Parameter(
     *         name="size",
     *         in="path",
     *         description="Appartement size to update",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *            @OA\Parameter(
     *         name="floor",
     *         in="path",
     *         description="Appartement floor to update",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *         @OA\Parameter(
     *         name="image",
     *         in="path",
     *         description="Appartement image to update",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="varchar255"
     *         ),
     *     ),
     *          @OA\Parameter(
     *         name="room",
     *         in="path",
     *         description="Appartement room to update",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *               @OA\Parameter(
     *         name="price",
     *         in="path",
     *         description="Appartement price to update",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *         @OA\Parameter(
     *         name="address",
     *         in="path",
     *         description="Appartement address to update",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="varchar255"
     *         ),
     *     ),
     *         @OA\Parameter(
     *         name="postcode",
     *         in="path",
     *         description="Appartement postcode to update",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *            @OA\Parameter(
     *         name="city",
     *         in="path",
     *         description="Appartement city to update",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="varchar255"
     *         ),
     *     ),
     * 
     * 
     *     @OA\Response(
     *         response=404,
     *         description="Appartement not found"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Validation exception"
     *     ),
  
     * )
     */
    public function modify(Request $request, Appartement $appartement)


    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'description' => 'required|max:255',
            'size' => 'required|min:2',
            'floor' => 'required|min:0',
            'image' => 'required|max:255',
            'room' => 'required|min:1',
            'price' => 'required|min:2',
            'address' => 'required|max:255',
            'postcode' => 'required|min:1',
            'city' => 'required|max:255',


        ]);

        $appartement->update([
            'title' => $request->title,
            'description' => $request->description,
            'size' => $request->size,
            'floor' => $request->floor,
            'image' => $request->image,
            'room' => $request->room,
            'price' => $request->price,
            'address' => $request->address,
            'postcode' => $request->postcode,
            'city' => $request->city,


        ]);
        return response()->json();
    }
    /**
     * @OA\Delete(
     *     path="/property/delete/{id}",
     *     tags={"appartement"},
     *     summary="Supprimer un appartement",
     *     operationId="delete",
     *     @OA\Parameter(
     *         name="Id",
     *         in="path",
     *         description="Appartement id to delete",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Appartement not found",
     *     ),
     *   
     * )
     */
    public function delete(Appartement $appartement)
    {
        $appartement->delete();

        // On retourne la réponse JSON
        return response()->json();
    }
}
