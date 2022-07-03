<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->content = $request->content;
        $article->image = $request->image->move('assets/images/articles', $request->image->hashName());
        $article->save();

        return redirect()->route('admin.articles.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Artikel berhasil ditambahkan');
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('assets/images/articles/'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('assets/images/articles/'.$fileName);
            $msg = 'Gambar berhasil diupload';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($request->hasFile('image')) {
            $article->image = $request->image->move('assets/images/articles', $request->image->hashName());
        }

        $article->title = $request->title;
        $article->description = $request->description;
        $article->content = $request->content;
        $article->save();

        return redirect()->route('admin.articles.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Artikel berhasil diubah');
    }

    public function destroy(Article $article)
    {
        if(file_exists($article->image)) {
            unlink($article->image);
        }
        $article->delete();
        return redirect()->route('admin.articles.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Artikel berhasil dihapus');
    }
}
