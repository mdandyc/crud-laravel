@foreach($blogs as $blog)
	<p>{{ $blog -> title }}</p>
	<p>{{ $blog -> subject }}</p>
	<hr>
@endforeach