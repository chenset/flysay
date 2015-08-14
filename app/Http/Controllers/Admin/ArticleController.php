<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    protected $imageUploadPath = '';

    public function __construct(Request $request, Article $articleM)
    {
        $this->imageUploadPath = storage_path() . '/uploads/article/images/';
        $this->request = $request;
        $this->articleM = $articleM;
    }

    public function postImage()
    {
        $validator = Validator::make($this->request->all(), [
            'upload' => 'required|mimes:jpeg,jpg,bmp,png,gif,svg',//类型判断
        ]);
        if ($validator->fails()) {
            return response('上传失败, 只允许jpeg,jpg,bmp,png,gif,svg类型!', 422);
        }

        if (!$this->request->hasFile('upload')) {
            return response('上传失败!', 500);
        }

        $file = $this->request->file('upload');

        $extension = $file->getClientOriginalExtension();   //文件后缀
        $newName = str_replace('.', '', uniqid('', true)) . "." . $extension;

        $datePath = date('Ym');
        $uploadPath = $this->imageUploadPath . $datePath;
        create_dir($uploadPath);

        $path = $file->move($uploadPath, $newName);

        if (!$path) {
            return response('移动文件失败!', 500);
        }

        return response('<script>
                window.parent.CKEDITOR.tools.callFunction(' . $this->request['CKEditorFuncNum'] . ',"' . route('article.image.upload.get', [$datePath, $newName]) . '","");
                </script>');
    }

    public function index()
    {
        $articles = $this->articleM->all();
        return view('admin/article/index', compact('articles'));
    }

    public function create()
    {
        return view('admin/article/edit', ['article' => []]);
    }

    public function store()
    {
        $this->validate($this->request, [
            'type' => 'required|integer|in:' . implode(',', array_keys(config('blog.article_type'))),
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'order' => 'required|integer|min:-2147483648|max:2147483647',
            'display' => 'required|in:1,0',
            'release_time' => 'required|date_format:Y-m-d',
        ]);
        $data = $this->request->all();
        $data['order'] = (int)$data['order'];
        $data['release_time'] = strtotime($data['release_time']);
        $data['user_id'] = Auth::user()['id'];

        $article = $this->articleM->create($data);

        return response(['msg' => '保存成功!', 'url' => route('admin.article.edit', $article['id'])]);
    }

    public function edit($id)
    {
        $article = $this->articleM->findOrFail($id);
        return view('admin/article/edit', compact('article'));
    }

    public function update($id)
    {
        $this->validate($this->request, [
            'type' => 'required|integer|in:' . implode(',', array_keys(config('blog.article_type'))),
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'order' => 'required|integer|min:-2147483648|max:2147483647',
            'display' => 'required|in:1,0',
            'release_time' => 'required|date_format:Y-m-d',
        ]);
        $data = $this->request->all();
        $data['release_time'] = strtotime($data['release_time']);
        $data['order'] = (int)$data['order'];

        $article = $this->articleM->findOrFail($id);
        $article->update($data);

        return response(['msg' => '保存成功!', 'url' => route('admin.article.edit', $article['id'])]);
    }
}