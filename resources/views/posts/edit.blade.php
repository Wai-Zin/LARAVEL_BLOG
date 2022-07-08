<h1> Edit Post</h1>
<form action= "/posts/update/{{$post -> id}}"  method="POST">
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
     @csrf

    <label>Post Title</label>
    <input type="text" name="title" value="{{ $post -> title }}">
    <br><br>

    <label>Post Body</label>
    <textarea name="body">
        {{$post -> body}}
    </textarea>
    <br><br>

    <button type="submit">Update</button>
</form>
