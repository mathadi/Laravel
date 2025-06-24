<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SweetAlert;

class UserController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // On récupère les données du formulaire
        $data = $request->only(['title', 'content', 'draft', 'image']);

        // Créateur de l'article (auteur)
        $data['user_id'] = Auth::user()->id;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }
        // Gestion du draft
        $data['draft'] = isset($data['draft']) ? 1 : 0;

        // On crée l'article
        $article = Article::create($data); // $article est l'objet article nouvellement créé

        // Exemple pour ajouter la catégorie 1 à l'article
        // $article->categories()->sync(1);

        // Exemple pour ajouter des catégories à l'article
        // $article->categories()->sync([1, 2, 3]);

        // Exemple pour ajouter des catégories à l'article en venant du formulaire
        $article->categories()->sync($request->input('categories'));

        // On redirige l'utilisateur vers la liste des articles
        return redirect()->route('dashboard')->with('success', 'Article crée !');
    }

    public function index()
    {
        // On récupère l'utilisateur connecté.
        $user = Auth::user();
        $articles = Article::where('user_id', $user->id)->orderBy('id', 'DESC')->get();

        // On retourne la vue.
        return view('dashboard', [
            'articles' => $articles
        ]);
    }
    public function edit(Article $article)
    {

        // On vérifie que l'utilisateur est bien le créateur de l'article
        if ($article->user_id !== Auth::user()->id) {
            abort(403);
        }
        // On retourne la vue avec l'article
        return view('articles.edit', [
            'article' => $article
        ]);
    }
    public function update(Request $request, Article $article)
    {
        // On vérifie que l'utilisateur est bien le créateur de l'article
        if ($article->user_id !== Auth::user()->id) {
            abort(403);
        }

        // On récupère les données du formulaire
        $data = $request->only(['title', 'content', 'draft', 'image']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        // Gestion du draft
        $data['draft'] = isset($data['draft']) ? 1 : 0;

        // On met à jour l'article
        $article->update($data);

        // SweetAlert::success('Success Message', 'Optional Title');
        // On redirige l'utilisateur vers la liste des articles (avec un flash)
        return redirect()->route('dashboard')->with('success', 'Article mis à jour !');
        // alert()->success('Basic Message', 'Mandatory Title')->autoclose(3500);
        // redirect()->route('dashboard')->with('success', 'Article mis à jour !');
    }

    public function remove(Article $article)
    {
        // On vérifie que l'utilisateur est bien le créateur de l'article
        if ($article->user_id !== Auth::user()->id) {
            abort(403);
        }
        $article->delete();
        return redirect()->route('dashboard')->with('success', 'Article supprimé !');
    }

    public function like(Article $article)
    {
        // On vérifie que l'utilisateur n'est pas le créateur de l'article
        // if ($article->user_id === Auth::user()->id) {
        //     abort(403);
        // }

        // On incrémente le nombre de likes
        $article->increment('likes');

        return redirect()->back();
    }
}
