<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Softland;
use Illuminate\Support\Facades\Cache;
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
        $articles = Cache::remember('blig-list', 5, function () {
            return Article::all();
        });
        $softland = Cache::remember('softlands', 5, function () {
            return Softland::all()->first();
        });
        
        foreach ($articles as $elem) {
            $lien_convivial = Str::slug($elem->titre . '-' . $elem->resume, '-');            
            
            $filename = $elem->image;

            $parts = explode('.', $filename);
            
            // obtention du format de l'image
            $format = end($parts);
            
            // definition du format de l'image
            $elem->format = $format;                                    

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

}
