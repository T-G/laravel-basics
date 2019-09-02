@extends('main')
@section('contents')
<html lang="en">
  <body>
    <main class="container">
        <h1>Create</h1>
        {!! Form::open(['route' => 'data.store']) !!}
            {{ Form::text('title', null) }}
            {{ Form::submit('SUBMIT')}}
        {!! Form::close() !!}
    </main>
  </body>
</html>
@endsection