<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index()
    {
        $book = Book::latest()->paginate(5);
        return view('book.index', compact('book'));
    }

    /**
    * create
    *
    * @return void
    */
    public function create()
    {
        return view('book.create');
    }    

    /**
    * store
    *
    * @param Request $request
    * @return void
    */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'pages' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg|max:5000'
        ]);
    
        $imagePath = '';
        if ($request->hasFile('images')) {
            $imageName = time() . '.' . $request->images->extension();
            $request->images->move(public_path('public\images'), $imageName);
            $imagePath = 'public/images/' . $imageName;
        }
    
                

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'pages' => $request->pages,
            'images' => $imagePath
        ]);
        try{
            return redirect()->route('book.index');
        }catch (Exception $e){
            return redirect()->route('book.create');
        }
    
    }
    
    

    /**
    * edit
    * 
    * @param int $id
    * @return void
    */
    public function edit($id)
    {
        $book = Book::find($id);
        $books = Book::all();
        return view('book.edit', compact('book'));
    }

    /**
    * update
    *
    * @param mixed $request
    * @param int $id
    * @return void
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'pages' => 'required',
        ]);
        
        $book = Book::findOrFail($id);

        if ($request->hasFile('images')) {
            if ($book->images && file_exists(public_path($book->images))) {
                unlink(public_path($book->images));
            }
    
            $imageName = time() . '.' . $request->images->extension();
            $request->images->move(public_path('public/images'), $imageName);
            $book->images = 'public/images/' . $imageName;
        }
    
        $book->title = $request->title;
        $book->author = $request->author;
        $book->pages = $request->pages;
        $book->save();

        return redirect()->route('book.index')->with('success', 'Book updated successfully');
    }
    


    /**
    * destroy
    *
    * @param int $id
    * @return void
    */
    public function destroy($id)
    {
        $books = Book::find($id);

        if ($books) {
            $imagePath = public_path('/' . $books->images);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $books->delete();
        }

        return redirect()->route('book.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
