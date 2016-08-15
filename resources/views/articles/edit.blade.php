@extends('MasterLayout')
@section('title')
Edit Article
@stop
@section('navigation')
@include('navigation')
@stop
@section('content')

	<h1>Edit: {!!$article->title !!}</h1>

	{!! Form::model($article,['method' => 'PATCH', 'action' => ['articlesController@update',$article->id]]) !!}
	@include('articles/form',['submitButton'=>'Update Article'])
	{!! Form::close() !!}

@include('errors/list')

@stop