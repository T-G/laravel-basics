@extends('main')
@section('contents')
<html lang="en">
  <body>
    <main class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
        <tr>
        <th scope="row">{{ $post->id }}</th>
        <td>{{ $post->title }}</td>
        </tr>
    @endforeach
  </tbody>
</table>
{{ $posts->links() }}
    </main>
  </body>
</html>
@endsection