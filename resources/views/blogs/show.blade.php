{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとの値を代入 --}}
@section('title', '記事詳細')

{{-- application.blade.phpの@yield('content')に以下のレイアウトを代入 --}}
@section('content')
    <h1>{{$blog->title}}</h1>
    <p>{{$blog->body}}</p>
    <br><br>
    <a href="/blogs/{{$blog->id}}/edit">編集する</a>
    <form action="/blogs/{{$blog->id}}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="delete">
      <input type="submit" name="" value="削除する">
    </form>
    <a href="/blogs">一覧に戻る</a>
@endsection