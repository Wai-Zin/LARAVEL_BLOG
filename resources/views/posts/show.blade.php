


@extends('layouts.master')

   {{-- @section('title')
    {{ $post -> title}}
   @endsection --}}

   @section('title',  $post -> title )

   @section('content')
<div class="card">
    <div class="card-body">


   <h3> {{ $post-> title}}</h3>
   <p> Post By Mg Mg</p>
   <p> {{ $post -> body }}</p>


   <a href="/posts" class="btn btn-outline-secondary">Go Home</a>
    </div>
</div>

 @endsection


