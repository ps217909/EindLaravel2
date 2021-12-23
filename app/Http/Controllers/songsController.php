<?php

namespace App\Http\Controllers;

use App\Models\songs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class songsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = songs::paginate(5);

        return view('songs.index', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('songs.create');
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
                'titel' => 'required',
                'zanger' => 'required',
            ]);

            songs::create($request->all());

            return redirect()->route('songs.index')
                ->with('success', 'songs created successfully.');
        }
        else {
            return redirect("/login");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function show(songs $song)
    {
        return view('songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function edit(songs $song)
    {
        if(Auth::check()){
            return view('songs.edit', compact('song')); 
        }
      else{
        return redirect("/login");
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, songs $song)
    {
        if(Auth::check()){
            $request->validate([
                'titel' => 'required',
                'zanger' => 'required',
            ]);
    
            $song->update($request->all());
    
            return redirect()->route('songs.index')
                ->with('success', 'songs updated successfully');
        }
        else{
            return redirect("/login"); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function destroy(songs $song)
    {
        if(Auth::check()){
            $song->delete();

            return redirect()->route('songs.index')
                ->with('success', 'songs deleted successfully');
            }
            else{
                return redirect("/login");
            }
    }
}
