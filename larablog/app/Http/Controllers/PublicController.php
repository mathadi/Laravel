<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(User $user)
    {
        // On récupère les articles publiés de l'utilisateur
        $articles = Article::where('user_id', $user->id)->where('draft', 0)->orderBy('id', 'DESC')->get();

        // On retourne la vue
        return view('public.index', [
            'articles' => $articles,
            'user' => $user
        ]);
    }
    public function show(User $user, Article $article)
    {
        // $user est l'utilisateur de l'article
        // $article est l'article à afficher

        // Je vous laisse faire le code
        // N'oubliez pas de vérifier que l'article est publié (draft == 0)
         // Vérifie que l'article appartient bien à l'utilisateur passé dans l'URL
    if ($article->user_id !== $user->id) {
        abort(403); // pour dire "accès refusé"
    }
 
    // Vérifie que l'article est publié
    if ($article->draft) {
        abort(403, 'Article en brouillon.');
    }
 
    // Affiche l'article dans la vue show
    return view('public.show', [
        'article' => $article,
        'user' => $user
    ]);
    }
}
