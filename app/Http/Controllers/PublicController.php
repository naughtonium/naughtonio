<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function barcode()
    {
        return view('public.barcode.index');
    }

    public function barcodeize()
    {
        dd('asdf');
    }

    public function quoridor()
    {
        return view('public.quoridor.index');
    }

    public function tinyTables()
    {
        return view('public.tiny-tables.index');
    }

    public function pathfinder()
    {
        return view('public.pathfinder.index');
    }

    public function geneticPathfinder()
    {
        return view('public.genetic-pathfinder.index');
    }

    public function starWars()
    {
        return view('public.star-wars.index');
    }

    public function clock()
    {
        return view('public.clock.index');
    }

    public function face()
    {
        return view('public.face.index');
    }

    public function loans()
    {
        return view('public.loans.index');
    }
}
