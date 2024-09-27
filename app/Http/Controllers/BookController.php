<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);
        return view('books.index')->with('books',$books);
        
    }
    public function show($id)
    {
        $book = Book::find($id);

        return view('books.show')->with('book',$book);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'author'=> 'required',
            'isbn'  => 'required|size:13',
            'stock' => 'required|numeric|integer|gte:0',
            'price' => 'required|numeric'
        ];
        $messages = [
            'stock' => 'The Stock must be grater than or equal to 0'
        ];
        $request->validate($rules, $messages);
        
        //option 1:
        // $book = new Book();
        // $book->title = $request->title;
        // $book->author = $request->author;
        // $book->isbn = $request->isbn;
        // $book->stock = $request->stock;
        // $book->price = $request->price;
        // $book->save();

        //option 2:
        //$book = Book::create($request->all());

        //option 3:
        $book = [
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'stock' => $request->stock,
            'price' => $request->price,
        ];
        $book = Book::create($book);
        return redirect()->route('books.show', $book->id);
    }
    public function destroy(Request $request, $id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect()->route('books.index');
    }
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit')->with('book',$book);
    }
    public function update(Request $request)
    {
        $rules = [
            'title' => 'required',
            'author'=> 'required',
            'isbn'  => 'required|size:13',
            'stock' => 'required|numeric|integer|gte:0',
            'price' => 'required|numeric'
        ];
        $messages = [
            'stock' => 'The Stock must be grater than or equal to 0'
        ];
        $request->validate($rules, $messages);

        $book = Book::find($request->id);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->stock = $request->stock;
        $book->price = $request->price;
        $book->save();

        return redirect()->route('books.show', $book->id);
    }
}
  