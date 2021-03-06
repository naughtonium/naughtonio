<?php

namespace App\Http\Controllers;

use App\Jobs\AddLatLongFromZipToUser;
use App\Repositories\WeatherTextRepository;
use Illuminate\Http\Request;

class WeatherTextController extends Controller
{
    protected $weatherTextRepo;

    public function __construct(WeatherTextRepository $weatherTextRepository)
    {
        $this->weatherTextRepo = $weatherTextRepository;
    }

    /**
     * Returns one of two views to gather needed info
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $user = \Auth::user();

        return view('weathertext.show', [
            'user'          => $user,
            'weatherText'   => $user->weatherText,
            'times'         => $this->weatherTextRepo->getTimes(),
            'timezones'     => $this->weatherTextRepo->getTimezones(),
        ]);
    }

    /**
     * Updates the User and WeatherText records
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'time'      => 'required',
            'timezone'  => 'required',
        ]);

        $this->weatherTextRepo->updateUserAndWeatherText($request->all());

        return back()->with(['success' => 'Record Saved']);
    }
}
