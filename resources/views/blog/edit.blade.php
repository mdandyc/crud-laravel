

<h1>Edit Post</h1>

<form action="/blog/{{$blog->id}}" method="post">
	<input type="text" name="title" placeholder="judul" value="{{$blog->title}}"><br>
	{{ ($errors->has('title')) ? $errors->first('title') : '' }} <br>

	<textarea name="subject" placeholder="Isi..">{{$blog->subject}}</textarea><br>
	{{ ($errors->has('subject')) ? $errors->first('subject') : '' }} <br>

	<input type="hidden" name="_method" value="put">
	<input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
	<input type="submit" name="name" value="edit">
</form>