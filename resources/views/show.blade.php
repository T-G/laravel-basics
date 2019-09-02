@extends('main')
@section('contents')
<html lang="en">
  <body>
    <main class="container">
        <p>The title is : {{ $post->title }}</p>
        {!! Form::open(['route'=>['data.destroy', $post->id], 'method'=>'DELETE']) !!}
          {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
        {!! Form::close() !!}
    </main>
  </body>
</html>
@endsection()