<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\VotoResource;
use App\Http\Resources\VotoCollection;
use App\Models\Voto;
use Illuminate\Http\Response;
use App\Http\Requests\VotoRequest;
use Illuminate\Support\Facades\Validator;

class VotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VotoRequest $request)
    {
        return response()->json(new VotoCollection(Voto::where($request->only('id_user', 'id_producao'))->get()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VotoRequest $request)
    {
        return response()->json(Voto::insert($request->only('id_user', 'id_producao', 'voto')), Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new VotoResource(Voto::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(['id' => $id], ['id' => 'required|int|exists:App\Models\Voto,id']);
        
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
 
        $validated = $validator->validated();

        $voto = Voto::find($id);
        $voto->voto = $request->input('voto');
        
        return response()->json($voto->save(), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
