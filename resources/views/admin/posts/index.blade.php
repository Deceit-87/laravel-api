@extends('layouts.app')

@section('content')
<h1>Elenco Articoli</h1>
<ul>
    @foreach ($posts as $post)
    <li>
        {{$post->title}}

    </li>
        
    @endforeach
</ul>


@endsection 









