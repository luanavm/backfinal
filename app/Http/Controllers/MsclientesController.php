<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Http\Requests\ClientePostRequest;
use App\Mail\NuevoCliente;
use App\Models\msclientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\Comment as CommentResource;

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
    public function crear(ClientePostRequest $request)
    {
        $msclientes = msclientes::create([
            'nombre' => $request ['nombre'],
            'mail' => $request ['mail'],
            'telefono'=> $request ['telefono'],
            'mensaje' => $request ['mensaje'], 
        ]);

        // aca realizamos el envio del mail
        $details = [
            'title' => 'Ingresó un nuevo contacto',
            'body' =>   $msclientes
        ];

        Mail::to('luanamartinez29519@gmail.com')->send(new NuevoCliente($details));

        // respuesta que va a devolver cuando se solicite esta ruta
        return response()->json([
            'mensaje' => 'Ingresó un nuevo contacto',
            'data' => $msclientes
        ]);
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
        $comment = $msclientes::find($id);
        $comment->nombre = $request['nombre'];
        $comment->mail = $request['mail'];
        $comment->telefono = $request['telefono'];
        $comment->mensaje = $request['mensaje'];
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

    private function enviarMail($details)
    {
        Mail::to('luanamartinez29519@gmail.com')->send(new NuevoContacto($details));
    }
}
