<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    public function createBook(){
        return view('createBook');
    }

    public function storeBook(Request $request){

        $request->validate([
            'Name' => 'required|unique:books,Name,except,id',
            'PublicationDate' => 'required',
            'Stock' => 'required|integer|gt:5',
            'Author' => 'required|min:5',
            'Image' => 'required|mimes:png,jpg'
        ]);

        $fileName = time()  . '-' . $request->Name.'_'.$request->Author . '-' . $request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('/public/image', $fileName);

        Books::create([
            'Name' => $request->Name,
            'PublicationDate' => $request->PublicationDate,
            'Stock' => $request->Stock,
            'Author' => $request->Author,
            'Image' => $fileName,
        ]);

        return redirect('/');
    }

    public function showBook(){
        $books = Books::all();
        return view('welcome', compact('books'));
    }

    public function editBook($id){
        $book = Books::findOrFail($id);
        return view('editBook', compact('book'));
    }

    public function updateBook(Request $request, $id){

        $request->validate([
            'Name' => 'required',
            'PublicationDate' => 'required',
            'Stock' => 'required|integer|gt:5',
            'Author' => 'required|min:5',
        ]);

        $book = Books::findOrFail($id);
        $image = $request->file('Image');

        if($image){
            Storage::delete('/public/image/'. $book->Image);
            $fileName = time()  . '-' . $request->Name.'_'.$request->Author . '-' . $request->file('Image')->getClientOriginalName();
            $image->storeAs('/public/image', $fileName);
            $book->update([
                'Image' => $fileName,
            ]);
        }

        $book->update([
            'Name' => $request->Name,
            'PublicationDate' => $request->PublicationDate,
            'Stock' => $request->Stock,
            'Author' => $request->Author,
        ]);

        return redirect('/bukubaku');
    }
}
