<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Article;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\File;

class ArticleController extends Controller
{
    protected $imageUploadPath = '';

    public function __construct(Request $request, Article $articleM)
    {
        $this->imageUploadPath = storage_path() . '/uploads/article/images/';
        $this->request = $request;
        $this->articleM = $articleM;
    }

    public function show($id)
    {
        $article = $this->articleM->findOrFail($id);
        return view('article/show', compact('article'));
    }

    public function getNotice()
    {
        $articles = $this->articleM->where('type', 1)->orderBy('order', 'desc')->orderBy('release_time', 'desc')->orderBy('created_at', 'desc')->paginate(10);
        return view('article/notice', compact('articles'));
    }

    public function getNews()
    {
        $articles = $this->articleM->where('type', 2)->orderBy('order', 'desc')->orderBy('release_time', 'desc')->orderBy('created_at', 'desc')->paginate(10);
        return view('article/news', compact('articles'));
    }

    public function getImage($datePath, $fileName)
    {
        $file = new File($this->imageUploadPath . $datePath . '/' . $fileName);

        header("Content-Type: " . $file->getMimeType());
        header("Content-Length: " . $file->getSize());
        readfile($file);
        exit;

//        return response(readfile($file))->header('Content-Type', $file->getMimeType())->header('Content-Length', $file->getSize());//fixme 无效
    }
}