@extends('main')
@section('contents')
<html lang="en">
  <body>
    <main class="container">
        <h1>Edit</h1>
        {!! Form::model($post, ['route'=>['data.update', $post->id], 'method'=>'PUT']) !!}
            {{ Form::text('title') }}
            {{ Form::submit('Save Changes', ['class'=>'btn btn-success']) }}
        {!! Form::close() !!}
    </main>
  </body>
</html>
@endsection