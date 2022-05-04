<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieImage;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
    
        foreach ($movies as $movie) {
            $movieImage = MovieImage::find($movie->id);
            $movie['image'] = $movieImage->file_path;
        }

        return view('movies.index', [
            'movies' => $movies
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'synopsis' => 'required|max:255',
            'length' => 'required|max:255',
        ]);

        $m = new Movie;
        $m->title = $validatedData['title'];
        $m->synopsis = $validatedData['synopsis'];
        $m->length = $validatedData['length'];
        $m->save();

        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);
            $request->file->store('movieImage', 'public');
            $mostImage = new MovieImage([
                
                "id" => $a->id,
                "file_path" => $request->file->hashName()
            ]);
            $movieImage->save();
        }

        session()->flash('message', 'Movie Successfully Created.');
        return redirect()->route('dashboard');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        $movieImage = MovieImage::find($movie->id);

         return view('movies.show', [
              'movie' => $movie, 
              'movieImage' => $movieImage,
         ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $movieForEditing = Movie::findOrFail($id);

        //if (! Gate::allows('update-post', $postForEditing)) {
        //    return response('Access denied : You cannot edit this post');
        //}
       
        return view('movies.edit', [
            'movie' => $movieForEditing
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'synopsis' => 'required|max:255',
            'length' => 'required|max:255',
        ]);

        $movieForEditing = Movie::findOrFail($id);

       // if (! Gate::allows('update-post', $postForEditing)) {
       //     return response('Access denied : You cannot edit this post');
       // }

        Movie::find($id)->update([
            'title' => request('title'),
            'synopsis' => request('synopsis'),
            'length' => request('length'),
        ]);

        return redirect()->route('movies.show', ['id' => $id])->with('message', 'Movie Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movieForDeletion = Movie::findOrFail($id);

        //if (! Gate::allows('delete-post', $postForDeletion)) {
        //    return response('Access denied : You cannot delete this post');
        //}
        
        $movieForDeletion->delete();
        return redirect()->route('movies.show', ['id' => \Auth::user()->id])->with('message', 'Movie Deleted');
    }
}
