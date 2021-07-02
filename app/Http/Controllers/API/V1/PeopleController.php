<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PeopleResource;

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
        return response([ 'people' => PeopleResource::collection($people), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'people_dni' => 'required|max:10',
            'people_fname' => 'required|max:255',
            'people_sname' => 'nullable|max:255',
            'people_fsurname' => 'required|max:255',
            'people_ssurname' => 'nullable|max:255',
            'people_birth_at' => 'required',
            'people_phone' => 'nullable|max:12',
            'people_address' => 'nullable',
            'people_email' => 'required|max:255|email:rfc,dns',
            'people_age' => 'numeric|required|min:18|max:65',

        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $people = People::create($data);

        return response(['people' => new PeopleResource($people), 'message' => 'Created successfully'], 201);
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
        return response(['people' => new PeopleResource($people), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $people)
    {
        $people = People::find($people);
        $people->update($request->all());

        return response(['people' => new PeopleResource($people), 'message' => 'Update successfully'], 200);
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

        $people->delete();

        return response(['message' => 'Deleted']);
    }
}
