<h1>Post List</h1>
<a href="/posts/create">Create a Post </a>

<ul>@foreach ($posts as $post)
<li>
    <a href="/posts/show/{{ $post -> id }}">{{ $post->title }} </a>
    [<a href="/posts/{{ $post-> id }}/edit" >Edit</a>]
    <form action="/posts/{{ $post -> id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure')" >Delete</button>
    </form>
    {{-- [<a href="/posts/delete/{{ $post -> id}}" onclick ="confirm('Are you Sure For Delete?')">Delete</a>] --}}
</li>
  @endforeach
</ul>
