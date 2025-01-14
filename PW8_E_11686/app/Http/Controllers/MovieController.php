<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Movie;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index()
    {
        $movies = Movie::all();
        return view ('movies', compact('movies'));
    }

    /**
    * create
    *
    * @return void
    */
    public function create()
    {
        return view('dashboard');
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
            'image_path' => 'required',
            'name' => 'required',
            'release_year' => 'required',
            'description' => 'required'
        ]);

        $imagePath = '';
        if ($request->hasFile('image_path')) {
            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        }

        Movie::create([
            'image_path' => $imagePath,
            'name' => $request->name,
            'release_year' => $request->release_year,
            'description' => $request->description
        ]);
        try {
            return redirect()->route('dashboard');
        } catch (Exception $e) {
            return redirect()->route('dashboard');
        }
    }


    /**
    * destroy
    *
    * @param int $id
    * @return void
    */
    public function destroy($id)
    {
        $movie = Movie::find($id);

        if ($movie) {
            $imagePath = public_path('' . $movie->image_path);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $movie->delete();
        }
        return redirect()->route('movies.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
