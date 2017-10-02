<?php

namespace App\Http\Controllers;

use App\Libraries\BreadthSearcher;
use App\Repositories\ThronesSearcherRepository;
use Illuminate\Http\Request;

class ThronesSearcherController extends Controller
{
    public function show()
    {
        $thronesRepo = new ThronesSearcherRepository();
        $characters = $thronesRepo->getAllCharacters()
            ->mapWithKeys(function ($char) {
                return [$char->Id => $char->Name];
            });
        return view('public.thronessearcher.show', compact('characters'));
    }

    public function search(Request $request)
    {
        $searcher = new BreadthSearcher();

        $path = $searcher->findChain($request->input('first_character_id'), $request->input('second_character_id'));

        \Session::flash('path', $path);
        \Session::flash('characterSelectedOne', $request->input('first_character_name'));
        \Session::flash('characterSelectedTwo', $request->input('second_character_name'));

        return redirect()->to('/public/song-of-ice-and-fire-connector');
    }
}
