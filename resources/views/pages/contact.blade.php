@extends('MasterLayout')
@section('title')
Contact form
@stop
@extends('navigation')
@section('navAction3')
class="active"
@stop
@stop
	@section('content')
	<h1>Contact me!</h1>
	<hr/>
	{!! Form::open(array('action' => 'pagesController@contactStore', 'class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('Your Name') !!}
    {!! Form::text('name', null,
        array('class'=>'form-control',
              'placeholder'=>'Your name')) !!}
</div>

<div class="form-group">
    {!! Form::label('Your E-mail Address') !!}
    {!! Form::text('email', null,
        array('class'=>'form-control',
              'placeholder'=>'Your e-mail address')) !!}
</div>

<div class="form-group">
    {!! Form::label('Your Message') !!}
    {!! Form::textarea('message', null,
        array('class'=>'form-control',
              'placeholder'=>'Your message')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Contact Us!',
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
	@section('footer')
		@include('errors.list')
	@stop
@stop

