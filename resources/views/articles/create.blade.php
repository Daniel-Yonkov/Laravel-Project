@extends('MasterLayout')
@section('title')
Create Article
@stop
@extends('navigation')
@section('navAction1')
class="active"
@stop
@stop
@section('content')
	<h1>Create your article</h1>
	<hr/>
	{!! Form::open(['url'=>'articles']) !!}
	@include('articles/form',['submitButton'=>'Add Article'])
	{!! Form::close() !!}

	@include('errors/list')
@stop