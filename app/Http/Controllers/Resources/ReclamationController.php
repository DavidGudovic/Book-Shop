<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Models\Reclamation;
use App\Models\User;
use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return view('reclamations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,User $user)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reclamation $reclamation,User $user)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */
    public function edit(Reclamation $reclamation,User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reclamation $reclamation,User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reclamation $reclamation,User $user)
    {
        //
    }
}
