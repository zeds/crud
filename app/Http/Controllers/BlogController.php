<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        // return $blogs;
        return view('blogs.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // モデルからインスタンスを生成
        $blog = new Blog;
        // $requestにformからのデータが格納されているので、以下のようにそれぞれ代入する
        $blog->title = $request->title;
        $blog->body = $request->body;
        // 保存
        $blog->save();
        // 保存後 一覧ページへリダイレクト
        return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 引数で受け取った$idを元にfindでレコードを取得
        $blog = Blog::find($id);
        // viewにデータを渡す
        return view('blogs.show', ['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blogs.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // idを元にレコードを検索して$blogに代入
        $blog = Blog::find($id);
        // editで編集されたデータを$blogにそれぞれ代入する
        $blog->title = $request->title;
        $blog->body = $request->body;
        // 保存
        $blog->save();
        // 詳細ページへリダイレクト
        return redirect("/blogs/".$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // idを元にレコードを検索
        $blog = Blog::find($id);
        // 削除
        $blog->delete();
        // 一覧にリダイレクト
        return redirect('/blogs');
    }
}
