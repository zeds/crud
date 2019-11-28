{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとの値を代入 --}}
@section('title', '記事一覧')

{{-- application.blade.phpの@yield('content')に以下のレイアウトを代入 --}}
@section('content')
  <div>
    <a href="/blogs/create">新規作成</a>
  </div>
  @foreach ($blogs as $blog)
    <h4>{{$blog->title}}</h4>
    <p>{{$blog->body}}</p>
    <a href="/blogs/{{$blog->id}}">詳細を表示</a>
    <a href="/blogs/{{$blog->id}}/edit">編集する</a>
    <form action="/blogs/{{$blog->id}}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="delete">
      <input type="submit" name="" value="削除する">
    </form>
    {{-- <a href="/blogs/{{$blog->id}}">削除する</a> --}}
    <hr>
  @endforeach
@endsection