<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pais;
use stdClass;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rutas = $this->getRoutes();
        return view('welcome', compact('rutas'));
    }

    public function infoHome(Request $request) {
       $query = DB::connection('mysql')->select('CALL consulta_contenido_home(NULL, NULL)');
      // dd($query);
         return $query;
    }

    public function getRoutes() {
        $route = new stdClass();
        $route->infoH = route('infoHome');

        return $route;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
