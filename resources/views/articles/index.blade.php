@extends('MasterLayout')
@section('title')
Blogster
@stop
@section('navigation')
@include('navigation')
@stop
@section('content')
	<h1>Articles</h1>
	<hr/>

@foreach ($articles as $article)
	<article>
		<a href="{{action('articlesController@show', $article->id)}}">
			<h2>{{$article->title}}</h2>
		</a>
	</article>

	<div class="body">{{$article->body}}</div>
@endforeach
@stop