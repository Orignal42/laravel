<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Get(
 *      path="/api/property/all",
 *      operationId="getAllProperties",
 *      tags={"Get"},

 *      summary="Récupéré la liste des propriétés",
 *      description="Retourne la liste complète de toute les propriétés.",
 *      @OA\Response(
 *          response=200,
 *          description="Opération réussis",
 *          @OA\MediaType(
 *           mediaType="application/json",
 *      )
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Non authentifié",
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Accès refusé"
 *      ),
 * @OA\Response(
 *      response=400,
 *      description="Requête erroné"
 *   ),
 * @OA\Response(
 *      response=404,
 *      description="Page introuvable"
 *   ),
 *  )
 */ 

class AppartementController extends Controller
{

    public function all()
    {
        $properties = response()
            ->json(Appartement::all());
        return $properties;
    }

/**
 * @OA\Get(
 *      path="/api/property/detail/{id}",
 *      operationId="getOneProperties",
 *      tags={"Get"},

 *      summary="Récupéré une des propriétés",
 *      description="Retourne la liste complète de toute les propriétés.",
 *      @OA\Response(
 *          response=200,
 *          description="Opération réussis",
 *          @OA\MediaType(
 *           mediaType="application/json",
 *      )
 *      ),
 *    @OA\Parameter(
 *         description="Parameter with mutliple examples",
 *         in="path",
 *         name="id",
 *         required=true,
 *         @OA\Schema(type="number"),

 *     ),
 *      @OA\Response(
 *          response=401,
 *          description="Non authentifié",
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Accès refusé"
 *      ),
 * @OA\Response(
 *      response=400,
 *      description="Requête erroné"
 *   ),
 * @OA\Response(
 *      response=404,
 *      description="Page introuvable"
 *   ),
 *  )
 */ 


    public function detail($id)
    {
        $properties =  response()
            ->json(Appartement::findOrFail($id));
        return $properties;
    }


/**
     * @OA\Post(
     *      path="/api/property/add",
     *      summary="Ajouter une propriété",
     *      operationId="AddOneProperty",
     *      tags={"Create"},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Proprietes",
     *      @OA\JsonContent(
     *          required={"title", "description", "image", "postcode", "city", "address", "room", "price", "size", "floor" },
     *          @OA\Property(property="title", type="string"),
     *          @OA\Property(property="description", type="string"),
     *          @OA\Property(property="image", type="string"),
     *          @OA\Property(property="address", type="string"),
     *          @OA\Property(property="postcode", type="number"),
     *          @OA\Property(property="city", type="string"),
     *          @OA\Property(property="room", type="number"),
     *          @OA\Property(property="price", type="float"),
     *          @OA\Property(property="size", type="number"),
     *          @OA\Property(property="floor", type="number"),
     *      ),
     *   ),
     *      @OA\Response(
     *          response=200,
     *          description="Success"
     *      ),
     *  )
     */
    public function add(Request $request)
    {
          // http://127.0.0.1:8000/storage/image/1bz7voxO3K856W5xmE11w0alueyCilIEReMUKXao.png
    //  Storage::disk('local')->put('image',$request->image);
    $path = $request->file('image')->store('public/image');
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
     *     path="/api/property/modify/{id}",
     *     tags={"Update"},
     *     operationId="updateAppartement",
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied"
     *   ),
     * 
     *     @OA\Parameter(
 *         description="Parameter with mutliple examples",
 *         in="path",
 *         name="id",
 *         required=true,
 *         @OA\Schema(type="number"),

 *     ),
     * 
   *      @OA\RequestBody(
     *          required=true,
     *          description="Proprietes",
     *      @OA\JsonContent(
     *          required={"title", "description", "image", "postcode", "city", "address", "room", "price", "size", "floor" },
     *          @OA\Property(property="title", type="string"),
     *          @OA\Property(property="description", type="string"),
     *          @OA\Property(property="image", type="string"),
     *          @OA\Property(property="address", type="string"),
     *          @OA\Property(property="postcode", type="number"),
     *          @OA\Property(property="city", type="string"),
     *          @OA\Property(property="room", type="number"),
     *          @OA\Property(property="price", type="float"),
     *          @OA\Property(property="size", type="number"),
     *          @OA\Property(property="floor", type="number"),
     *      ),
     *   ),
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
    public function modify(Request $request, Appartement $appartement, $id)

    {
    $appartement = Appartement::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'size' => 'required|max:255',
            'floor' => 'required|max:255',
            'image' => 'required|max:255',
            'room' => 'required|max:255',
            'price' => 'required|max:255',
            'address' => 'required|max:255',
            'postcode' => 'required|max:255',
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
     *     path="/api/property/delete/{id}",
     *     tags={"Delete"},
     *     summary="Supprimer un appartement",
     *     operationId="delete",
     *    *  @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *          )
 *     ),
 *  *     @OA\Parameter(
 *         description="Parameter with mutliple examples",
 *         in="path",
 *         name="id",
 *         required=true,
 *         @OA\Schema(type="number"),

 *     ),
     *   
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
    public function delete(Appartement $appartement,$id)
    {
        try{
            $appartement = Appartement::findOrFail($id);
            $appartement->delete($id);
            // On retourne la réponse JSON
            return response()->json([
                'id' => $id,
                'appartement' => get_class($appartement),
            ]);            
        }catch (\Exception $e){
            return response()->json([
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
            ]);
        }
    }
}
