<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Models\Category;
class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('articles.create', compact('users', 'categories'));
    }

    public function store(Request $request)
    {
        $article = new Article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->user_id = $request->input('user_id');
        $article->category_id = $request->input('category_id');
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $article->image = $imageName;
            $article->save();
        }
        return redirect()->route('articles.index');
    }

    public function edit($id)   
    {
        $article = Article::findOrFail($id);
        $users = User::all();
        $categories = Category::all();
        return view('articles.edit', compact('article', 'users', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->user_id = $request->input('user_id');
        $article->category_id = $request->input('category_id');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            // Hapus gambar lama
            if ($article->image) {
                $oldImagePath = public_path('images') . '/' . $article->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $article->image = $imageName;
        }
        $article->save();
        return redirect()->route('articles.index');
    }
    

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        // Hapus file gambar permanen
        if ($article->image) {
            $imagePath = public_path('images') . '/' . $article->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $article->delete();
        return redirect()->route('articles.index');
    }


    public function home()
    {
        $articles = Article::all();
        return view('home', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }
}