<script>alert("{{ Session::get('message') }}");</script>

@foreach($blogs as $blog)
<a href="/blog/{{$blog->id}}">
	<p>{{ $blog -> title }}</p></a>
	<p>{{ $blog -> subject }}</p>
	<a href="/blog/{{$blog->id}}/edit">Edit</a>

	<form action="/blog/{{$blog->id}}" method="post">
		<input type="hidden" name="_method" value="delete">
		<input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
		<input type="submit" name="name" value="Delete">
	</form>
	<hr>
@endforeach
