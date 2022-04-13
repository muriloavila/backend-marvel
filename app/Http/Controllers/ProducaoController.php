<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProducaoResource;
use App\Http\Resources\ProducaoCollection;
use App\Models\Producao;
use App\Http\Requests\ProducaoRequest;
use Illuminate\Http\Response;

class ProducaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProducaoRequest $request)
    {
        return response()->json(new ProducaoCollection(
                                        Producao::where('name', 'like', '%'.$request->input('name').'%')
                                                    ->where($request->only('tipo', 'fase'))
                                                    ->get()
                                    )
                                );
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProducaoRequest $request)
    {
        $producao = new Producao();
        $producao->name = $request->input('name');
        $producao->tipo = $request->input('tipo');
        $producao->data_lancamento = !empty($request->input('data_lancamento')) ? $request->input('data_lancamento') : null;
        $producao->fase = !empty($request->input('fase')) ? $request->input('fase') : null;
        $producao->link_picture = !empty($request->input('link_picture')) ? $request->input('link_picture') : '';
        $producao->descricao = !empty($request->input('descricao')) ? $request->input('descricao') : '';

        return response()->json($producao->save(), Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProducaoResource(Producao::findOrFail($id));
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
        //
        
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
