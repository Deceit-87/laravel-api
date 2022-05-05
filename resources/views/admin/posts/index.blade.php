@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Elenco Articoli</h1>
    <form action="{{route('admin.posts.create')}}">
        <input type="submit" class="btn btn-primary btn-lg disabled"value="Crea nuovo Articolo">
        </form>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Slug</th>
            <th scope="col">Data Publlicazione</th>
            <th scope="col">Data Creazione</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)

          <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->slug}}</td>
            <td>{{$post->published_at}}</td>
            <td>{{$post->created_at}}</td>
            <td>
                <form action="{{route( 'admin.posts.edit', $post ) }}">
                    <input type="submit" class="btn btn-outline-success btn-md disabled"value="Modifica">
                </form>
            </td>
            <td>
                <form action="#">
                    <input type="submit" class="btn btn-outline-danger btn-md disabled"value="Elimina">
                </form>
            </td>


           
          
          </tr>
          @endforeach
          
        </tbody>
      </table>
   
 
    


</div>



@endsection 









