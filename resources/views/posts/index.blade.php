

   @extends('layouts.master')

   {{-- @section('title')
            Home Page
   @endsection --}}

   @section('title', 'Home Page')

   @section('content')

         <div class="container mt-5">
            @foreach($posts as $post)

            <div>
                <h3>
                    <a href="/posts{{ $post -> id }}">{{ $post -> title }}</a>
                </h3>
                  {{-- {{ $post -> created_at -> format('Y-M-D')}}by Mark --}}
                  {{ $post -> created_at -> diffForHumans()}} by Mark
                <p>{{$post -> body }}</p>
                <div class="d-flex justify-content-end">
                    {{-- <a href="/posts/{{ $post -> id }}">{{ $post->title }} </a> --}}
                    [<a href="/posts/{{ $post-> id }}/edit"  class="btn btn-outline-success">Edit</a>]
                    <form action="/posts/{{ $post -> id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure')" class="btn btn-outline-danger ms-2">Delete</button>
                    </form>
                </div>
               </div>
               <hr>

            @endforeach
            {{ $posts -> links()}}
        </div>



 @endsection










