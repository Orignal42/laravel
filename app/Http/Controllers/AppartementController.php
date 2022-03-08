<?php

namespace App\Http\Controllers;

use App\Models\Appartement;

use OpenApi\Attributes as OA;



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
    public function add()
    {
    }

   /**
     * Update an existing appartement.
     *
     * @OA\Post(
     *     path="/properties/modify/{Id}",
     *     tags={"appartement"},
     *     operationId="updateAppartement",
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied"
     *     ),
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
    public function modify()
    {
    }
    /**
     * @OA\Delete(
     *     path="/properties/delete/{Id}",
     *     tags={"appartement"},
     *     summary="Deletes a appartement",
     *     operationId="delete",
     *     @OA\Parameter(
     *         name="api_key",
     *         in="header",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
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
     *     security={
     *         {"petstore_auth": {"write:appartements", "read:appartements"}}
     *     },
     * )
     */
    public function delete()
    {
    }


}
