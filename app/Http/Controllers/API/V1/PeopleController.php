<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PeopleResource;
use App\Http\Requests\PeopleStoreRequest;
use App\Http\Requests\PeopleUpdateRequest;


class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = People::all();
        return response([ 'people' => PeopleResource::collection($people), 'message' => 'Dato entregado exitosamente'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeopleStoreRequest $request)
    {
        $data = $request->validated();

        $people = People::create($data);

        return response(['people' => new PeopleResource($people), 'message' => 'Creado exitosamente'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show($people)
    {
        $people = People::find($people);

        if (is_null($people)) {
            return response(['message' => 'Persona no encontrada para mostrar.',], 404);
        }
        return response(['people' => new PeopleResource($people), 'message' => 'Dato entregado exitosamente'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(PeopleUpdateRequest $request, $people)
    {
        $people = People::find($people);
        if (is_null($people)) {
         return response(['message' => 'Persona no encontrada para actualización.'], 404);
        }

        $people->update($request->validated());

        return response(['people' => new PeopleResource($people), 'message' => 'Actualizado exitosamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy($people)
    {
        $people = People::find($people);

        if (is_null($people)) {
        return response(['message' => 'No existe el elemento.'], 404);
        }

        $people->delete();

        return response(['message' => 'Elemento Borrado']);
    }
}
