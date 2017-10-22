<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhonebookRequest;
use App\Phonebook;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{
  
    public function index()
    {
        return Phonebook::orderByDesc('name')->get();
    }

  
    public function create()
    {
        //
    }

    
    public function store(PhonebookRequest $request)
    {
        $pb = Phonebook::create($request->all());
        return $pb;

    }

    
    public function show(Phonebook $phonebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Phonebook $phonebook)
    {
        //
    }


    public function update(Request $request, Phonebook $phonebook)
    {
        $phonebook->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phonebook $phonebook)
    {
       $phonebook->delete();
       return Phonebook::all();
    }
}
