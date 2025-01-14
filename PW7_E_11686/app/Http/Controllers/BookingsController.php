<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use Illuminate\Http\Request;
use App\Models\Book;

class BookingsController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index()
    {
        $bookings = Bookings::latest()->paginate(5);
    //render view with posts
        return view('bookings.index', compact('bookings'));
    }

        /**
    * create
    *
    * @return void
    */
    public function create()
    {
        $books = Book::all(); 
        return view('bookings.create', compact('books')); 
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
            'id_book' => 'required|exists:books,id', 
            'class' => 'required|string',
            'price' => 'required|numeric',
        ]);
    
        Bookings::create([
            'id_book' => $request->id_book, 
            'class' => $request->class,
            'price' => $request->price,
        ]);
        try{
            return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
        }catch (Exception $e){
            return redirect()->route('bookings.create');
        }

    }
    

    public function edit($id)
    {
        $booking = Bookings::findOrFail($id); 
        $books = Book::all(); 
        return view('bookings.edit', compact('booking', 'books')); 
    }


    /**
    * destroy
    *
    * @param int $id
    * @return void
    */
    public function destroy($id)
    {
        $booking = Bookings::find($id);
        $booking->delete();
        return redirect()->route('bookings.index')->with(['success' => 'Data Berhasil Dihapus!']);
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
            'id_book' => 'required|exists:books,id', 
            'class' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $booking = Bookings::findOrFail($id); 
        $booking->update([ 
            'id_book' => $request->id_book,
            'class' => $request->class,
            'price' => $request->price,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }
}

