@extends('layouts.master')

@section('title')
    Articles
@endsection

@section('content')
    <h2>Articles</h2>
    @each('partials.article', $articles, 'article', 'partials.no-articles')
  <!--   @foreach($articles as $article)
        <p>{{ $article['title'] }}</p>
        <p>{{ $article['body'] }}</p>
    @endforeach -->
    <!-- <a href="/article/{{ $article->id }}">Article</a> -->
@endsection
