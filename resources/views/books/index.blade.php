@extends('layout')

@section('page_content')  
    <p class="text-end">
        <a class="btn btn-primary" href="{{route('books.create')}}">New Book</a>
    </p>
    <table class="table table-striped table-border">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th colspan="3">Action</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>
                <a href="{{route('books.show',$book->id)}}">Details</a>
            </td>
            <td>
                <a href="{{route('books.edit',$book->id)}}">Edit</a>
            </td>
            <td>
                <form method="post" action="{{route('books.destroy',$book->id)}}" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <input type="submit" style="padding" value="Delete" class="btn btn-link text-danger">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$books->links()}}
@endsection
