<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Article;
use App\Http\Resources\Comment as CommentResource;
use App\Models\msclientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MsclientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

        public function index(){
            return msclientes::paginate();
        }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request)
    {
        $msclientes = new msclientes ();
        'nombre'-> $request['nombre'];
        'mail' -> $request['mail'];
        'telefono'-> $request['telefono'];
        'mensaje' -> $request['mensaje'];
        return json_encode(["msg"=>"agregado"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string'
         ]);
 
         $comment = $article->comments()->save(new Comment($request->all()));
 
         Mail::to($article->user)->send(new NuevoComentario ($comment));
 
         return response()->json(new CommentResource($comment), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\msclientes  $msclientes
     * @return \Illuminate\Http\Response
     */
    public function show(msclientes $msclientes, Comment $comment)
    {
        $comment = $msclientes->comments()->where('id', $comment->id)->firstOrFail();
        return response()->json(new CommentResource($comment), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\msclientes  $msclientes
     * @return \Illuminate\Http\Response
     */
    public function editar(msclientes $msclientes, $id){
        'nombre' -> $request['nombre'];
        'mail' -> $request['mail'];
        'telefono' -> $request['telefono'];
        'mensaje' -> $request['mensaje'];
        msclientes::where('id', $id)->update(
            ['nombre'=>$nombre,
            'mail'=>$mail,
            'telefono'=>$telefono,
            'mensaje'=>$mensaje]);
        return json_encode(["msg"=>"editado"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\msclientes  $msclientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, msclientes $msclientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\msclientes  $msclientes
     * @return \Illuminate\Http\Response
     */
    public function eliminar(msclientes $msclientes)
    {
        msclientes::eliminar($id);
        return json_encode(["msg"=>"eliminado"]);
    }
}
