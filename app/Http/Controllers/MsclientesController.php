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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit(msclientes $msclientes)
    {
        //
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
    public function destroy(msclientes $msclientes)
    {
        //
    }
}
