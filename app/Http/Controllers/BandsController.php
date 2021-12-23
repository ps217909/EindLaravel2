<?php

namespace App\Http\Controllers;

use App\Models\bands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands = bands::paginate(5);

        return view('bands.index', ['bands' => $bands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            if (Auth::check()) {
                return view('bands.create');
            } else {
                return redirect("/login");
            }
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
                'genre' => 'required',
                'onstaan' => 'required',
                'actieftot' => 'required',
            ]);
    
            bands::create($request->all());
    
            return redirect()->route('bands.index')
                ->with('success', 'bands created successfully.');
        }
        else {
            return redirect("/login");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bands  $bands
     * @return \Illuminate\Http\Response
     */
    public function show(bands $band)
    {
        return view('bands.show', compact('band'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bands  $bands
     * @return \Illuminate\Http\Response
     */
    public function edit(bands $band)
    {
        if(Auth::check()){
            return view('bands.edit', compact('band')); 
        }
        else
        {
        return redirect("/login");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bands  $bands
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bands $band)
    {
        if(Auth::check()){
            $request->validate([
                    'naam' => 'required',
                    'genre' => 'required',
                    'onstaan' => 'required',
                    'actieftot' => 'required',
                ]);
    
            $band->update($request->all());
    
            return redirect()->route('bands.index')
                ->with('success', 'bands updated successfully');
        }
        else{
            return redirect("/login"); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bands  $bands
     * @return \Illuminate\Http\Response
     */
    public function destroy(bands $band)
    {
        if(Auth::check()){
            $band->delete();

            return redirect()->route('bands.index')
                ->with('success', 'bands deleted successfully');
            }
            else{
                return redirect("/login");
            }
    }
}
