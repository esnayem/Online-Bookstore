@extends('layout')

@section('page_content')  
    <table class="table table-striped table border" >
        <tr>
            <th>Id</th>
            <td>{{$book->id}}</td>
        </tr>
        <tr>
            <th>Title</th>
            <td>{{$book->title}}</td>
        </tr>
        <tr>
            <th>Author</th>
            <td>{{$book->author}}</td>
        </tr>
        <tr>
            <th>Isbn</th>
            <td>{{$book->isbn}}</td>
        </tr>
        <tr>
            <th>Stock</th>
            <td>{{$book->stock}}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{$book->price}}</td>
        </tr>
    </table>
    <p>
        <a class="btn btn-success" href="{{route('books.index')}}">Go Back</a>
        <a class="btn btn-danger" href="{{route('books.edit',$book->id)}}">Edit</a>
    </p>
@endsection