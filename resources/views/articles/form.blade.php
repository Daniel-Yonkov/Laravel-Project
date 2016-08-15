{{-- Title Input Field --}}
	<div class="form-group">
		{!! Form::label('title','Name:') !!}
		{!! Form::text('title',null,['class'=>'form-control']) !!}
	</div>
	{{-- Body Input Field --}}
	<div class="form-group">
		{!! Form::label('body','Body:') !!}
		{!! Form::textarea('body',null,['class'=>'form-control']) !!}
	</div>
	{{-- Published_at Input Field --}}
	<div class="form-group">
		{!! Form::label('published_at','Publish On:') !!}
		{!! Form::input('date','published_at',date('Y-m-d'),['class'=>'form-control']) !!}
	</div>
	{{-- TAG Field --}}
	<div class="form-group">
		{!! Form::label('tag_list','Tags:') !!}
		{!! Form::select('tag_list[]',$tags,null,['id'=>'tag_list','class'=>'form-control', 'multiple']) !!}
	</div>
	{{-- Submit Form --}}
	<div class="form-group">
		{!! Form::submit($submitButton,['class'=>'btn btn-primary form-control',]) !!}
	</div>

	@section('footer')
		<script>
		$('#tag_list').select2({
			placeholder: 'Choose a tag'
		});
		</script>
	@stop