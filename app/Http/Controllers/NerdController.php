<?php

namespace App\Http\Controllers;

use App\Models\Nerd;
use Illuminate\Http\Request;


class NerdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the nerd
        $nerds = Nerd::all();

        // load the view and pass the nerds
        return view('nerds.index')->with('nerds', $nerds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // load the create form (app/views/nerds/create.blade.php)
        return view('nerds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        // read more on validation at http::/laravel.com/docs/validation

        $this->validate($request, [
            'name'        => 'required',
            'email'       => 'required|email',
            'nerd_level'  => 'required|numeric'
        ]);


            // store
            $nerd = new Nerd([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'nerd_level' => $request->get('nerd_level')
            ]);

            $nerd->save();
            // redirect
            $request->session()->flash('message', 'Successfullly created nerd!');
            return redirect('nerds');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the nerd
        $nerd = Nerd::find($id);

        // show the view and pass the nerd to it
        return view('nerds.show')
            ->with('nerd', $nerd);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the nerd
        $nerd = Nerd::find($id);

        // show the edit form and pass the nerd
        return view('nerds.edit', compact('nerd', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate
        // read more on validation at http::/laravel.com/docs/validation

        $this->validate($request, [
            'name'        => 'required',
            'email'       => 'required|email',
            'nerd_level'  => 'required|numeric'
        ]);


        // edit
        $nerd = Nerd::find($id);
        $nerd->name = $request->get('name');
        $nerd->email = $request->get('email');
        $nerd->nerd_level = $request->get('nerd_level');

        $nerd->save();
        // redirect
        $request->session()->flash('message', 'Successfullly edited nerd!');
        return redirect('nerds');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // delete
        $nerd = Nerd::find($id);
        $nerd->delete();

        //redirect
        $request->session()->flash('message', 'Successfullly deleted the nerd!');
        return redirect('nerds');
    }
}
