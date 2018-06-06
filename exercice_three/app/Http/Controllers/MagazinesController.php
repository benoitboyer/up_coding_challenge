<?php

namespace App\Http\Controllers;

use App\Magazine;
use Illuminate\Http\Request;

use Session;

class MagazinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the Magazines
        $magazines= Magazine::all();

        //return it to the view
        return view('magazine/index')->withMagazines($magazines);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Validate the datas using Laravel validation plus custom Rule object Location

        $this->validate($request, array(
                'name'      =>  'required|string|min:2|max:50',
                'price'     =>  'required|regex:/^\d*(\.\d{1,2})?$/',
                'cover '    =>  ['regex' => '/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
                'colour'    =>  'required|string|min:2|max:30',
                'size'      =>  'required|string|max:10',
                'theme'     =>  'required|string|max:30'

            ));

        // Create a new Magazine object and put the validated datas
        $magazine= New Magazine();

        $magazine->name = $request->name;
        $magazine->price = $request->price;
        $magazine->cover = $request->cover;
        $magazine->colour = $request->colour;
        $magazine->size = $request->size;
        $magazine->theme = $request->theme;
    
        // Save the magazine in the database
        $magazine->save();

        // Return a sucess message
        Session::flash('success', 'The magazine is created!');
        
        return redirect()->route('index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //search for the selected magazine in the database
        $magazine=Magazine::findOrFail($id);
        
        $magazine->delete();
        Session::flash('success', 'The magazine is deleted!');
        return redirect()->route('index');
    }
}
