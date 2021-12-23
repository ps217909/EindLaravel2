<?php

namespace App\Http\Controllers;

use App\Models\albums;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\songs;

class albumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = albums::paginate(5);

        return view('albums.index', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $songs = songs::all();
            return view('albums.create', compact('songs'));
        } else {
            return redirect("/login");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){

            $request->validate([
                'naam' => 'required',
                'jaar' => 'required',
                'verkocht' => 'required',
                'song' => 'required'
            ]);
            $album =albums::create($request->all());
            $songs= songs::find($request->song);
            $songs->albums()->save($album);


            return redirect()->route('albums.index')
                ->with('success', 'albums created successfully.');
        }
        else {
            return redirect("/login");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\albums  $albums
     * @return \Illuminate\Http\Response
     */
    public function show(albums $album)
    {
        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\albums  $albums
     * @return \Illuminate\Http\Response
     */
    public function edit(albums $album)
    {
        if(Auth::check()){
            return view('albums.edit', compact('album')); 
        }
      else{
        return redirect("/login");
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\albums  $albums
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, albums $album)
    {
        if(Auth::check()){
            $request->validate([
                'naam' => 'required',
                'jaar' => 'required',
                'verkocht' => 'required',
            ]);
    
            $album->update($request->all());
    
            return redirect()->route('albums.index')
                ->with('success', 'albums updated successfully');
        }
        else{
            return redirect("/login"); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\albums  $albums
     * @return \Illuminate\Http\Response
     */
    public function destroy(albums $album)
    {
        if(Auth::check()){
            $album->delete();

            return redirect()->route('albums.index')
                ->with('success', 'albums deleted successfully');
            }
            else{
                return redirect("/login");
            }
    }
}
