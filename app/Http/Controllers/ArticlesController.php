<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Softland;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    public function index()
    {
        $softland = Softland::all()->first();
        $softland->url = Str::slug($softland->title . '-' . $softland->apropos);
        return view('articles.index', compact('softland'));
    }

    public function blog_post()
    {
        $articles = Article::all();
        $softland = Softland::all()->first();
        foreach ($articles as $elem) {
            $lien_convivial = Str::slug($elem->titre . '-' . $elem->resume, '-');
            // on ajoute 'url' comme un nouveau collone dans le resultats de la base de données
            $elem->url = $lien_convivial;
        }
        $softland->url = Str::slug($softland->title . '-' . $softland->apropos);
        $data = [
            'articles' => $articles,
            'softland' => $softland            
        ];
        return view('articles.blog-post', $data);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $article = new Article;

        $article->titre = $request->titre;
        $article->resume = $request->resume;
        $article->contenu = $request->contenu;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $article->image = $imageName;
            $image->move(public_path('image-project/updload-backoffice'), $imageName);
        } else {
            echo 'tay';
        }

        $article->save();

        return redirect()->route('articles.index');
    }

    public function show($categorie, $article)
    {
        $article = Article::find($article);
        $softland = Softland::all()->first();
        $contenu = $article->contenu;
        $contenu_decode  = html_entity_decode($contenu);
        $softland->url = Str::slug($softland->title . '-' . $softland->apropos);
        $data = [
            'article' => $article,
            'contenu' => $contenu_decode,
            'softland' => $softland
        ];
        return view('articles.blog-single', $data);
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $article->titre = $request->titre;
        $article->contenu = $request->contenu;
        $article->resume = $request->resume;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $article->image = $imageName;
            $image->move(public_path('image-project/updload-backoffice'), $imageName);
        } else {
        }


        $article->save();

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }
}
