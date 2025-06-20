<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // On récupère les données du formulaire
        $data = $request->only(['content', 'article_id']);

        // On valide les données
        $request->validate([
            'content' => 'required|string|max:1000',
            'article_id' => 'required|exists:articles,id',
        ]);

        // On ajoute l'utilisateur connecté à la donnée
        // $data['user_id'] = auth()->id();

        // $comment = auth()->user()->comments()->create($data);
        
        if (Auth::check()) {
            // On crée le commentaire
            Comment::create([
                'content' => $data['content'],
                'article_id' => $data['article_id'],
                'user_id' => Auth::user()->id
            ]);
            
        } else {
            return redirect()->route('login');
        }

        // On redirige vers l'article avec un message de succès
        return redirect()->route('public.show', ['user' => Auth::user(), 'article' => $data['article_id']])
            ->with('success', 'Commentaire ajouté !');
    }
}
