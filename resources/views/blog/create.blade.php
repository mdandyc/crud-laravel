

<h1>Create Blog Post</h1>

<form action="/blog" method="post">
	<input type="text" name="title" placeholder="judul"><br>
	{{ ($errors->has('title')) ? $errors->first('title') : '' }} <br>
	<textarea name="subject" placeholder="Isi.."></textarea><br>
	{{ ($errors->has('subject')) ? $errors->first('subject') : '' }} <br>
	<input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
	<input type="submit" name="name" value="Post">
</form>