<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use PDF;

class PostController extends Controller
{
    public function getPostPdf(Post $post)
    {
        // Charger la vue Blade avec le contenu du post
        // $pdf = PDF::loadView('posts.show', compact('post'));

        // Télécharger le fichier PDF avec un nom basé sur le titre du post
        // return $pdf->download(\Str::slug($post->title) . '.pdf');
    }
}
