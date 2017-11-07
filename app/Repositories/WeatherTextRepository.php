<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 6/16/17
 * Time: 12:20 PM
 */

namespace App\Repositories;


use App\Jobs\AddLatLongFromZipToUser;
use App\Models\WeatherText\WeatherText;
use Auth;
use Carbon\Carbon;

class WeatherTextRepository
{
    public function updateUserAndWeatherText($data)
    {
        $user = Auth::user();

        if ( ! $weatherText = $user->weatherText) {
            $weatherText = new WeatherText();
        }

        $user->update([
            'timezone' => $data['timezone'],
        ]);

        $time = $this->getUTCTime($data);

        $weatherText->fill([
            'local_time' => $data['time'],
            'time' => $time,
            'active' => isset($data['active']),
        ]);

        $user->weatherText()->save($weatherText);
    }

    public function getUTCTime($data) {
        return Carbon::createFromFormat('H:i', $data['time'], $data['timezone'])
            ->setTimezone(new \DateTimeZone('UTC'))
            ->format('H:i');
    }

    public function getTimezones()
    {
        return [
            'America/New_York' => 'EST',
            'America/Chicago' => 'CST',
            'America/Denver' => 'MST',
            'America/Los_Angeles' => 'PST',
        ];
    }

    public function getTimes()
    {
        return [
            '00:00' => '0:00',
            '00:15' => '0:15',
            '00:30' => '0:30',
            '00:45' => '0:45',
            '01:00' => '1:00',
            '01:15' => '1:15',
            '01:30' => '1:30',
            '01:45' => '1:45',
            '02:00' => '2:00',
            '02:15' => '2:15',
            '02:30' => '2:30',
            '02:45' => '2:45',
            '03:00' => '3:00',
            '03:15' => '3:15',
            '03:30' => '3:30',
            '03:45' => '3:45',
            '04:00' => '4:00',
            '04:15' => '4:15',
            '04:30' => '4:30',
            '04:45' => '4:45',
            '05:00' => '5:00',
            '05:15' => '5:15',
            '05:30' => '5:30',
            '05:45' => '5:45',
            '06:00' => '6:00',
            '06:15' => '6:15',
            '06:30' => '6:30',
            '06:45' => '6:45',
            '07:00' => '7:00',
            '07:15' => '7:15',
            '07:30' => '7:30',
            '07:45' => '7:45',
            '08:00' => '8:00',
            '08:15' => '8:15',
            '08:30' => '8:30',
            '08:45' => '8:45',
            '09:00' => '9:00',
            '09:15' => '9:15',
            '09:30' => '9:30',
            '09:45' => '9:45',
            '10:00' => '10:00',
            '10:15' => '10:15',
            '10:30' => '10:30',
            '10:45' => '10:45',
            '11:00' => '11:00',
            '11:15' => '11:15',
            '11:30' => '11:30',
            '11:45' => '11:45',
            '12:00' => '12:00',
            '12:15' => '12:15',
            '12:30' => '12:30',
            '12:45' => '12:45',
            '13:00' => '13:00',
            '13:15' => '13:15',
            '13:30' => '13:30',
            '13:45' => '13:45',
            '14:00' => '14:00',
            '14:15' => '14:15',
            '14:30' => '14:30',
            '14:45' => '14:45',
            '15:00' => '15:00',
            '15:15' => '15:15',
            '15:30' => '15:30',
            '15:45' => '15:45',
            '16:00' => '16:00',
            '16:15' => '16:15',
            '16:30' => '16:30',
            '16:45' => '16:45',
            '17:00' => '17:00',
            '17:15' => '17:15',
            '17:30' => '17:30',
            '17:45' => '17:45',
            '18:00' => '18:00',
            '18:15' => '18:15',
            '18:30' => '18:30',
            '18:45' => '18:45',
            '19:00' => '19:00',
            '19:15' => '19:15',
            '19:30' => '19:30',
            '19:45' => '19:45',
            '20:00' => '20:00',
            '20:15' => '20:15',
            '20:30' => '20:30',
            '20:45' => '20:45',
            '21:00' => '21:00',
            '21:15' => '21:15',
            '21:30' => '21:30',
            '21:45' => '21:45',
            '22:00' => '22:00',
            '22:15' => '22:15',
            '22:30' => '22:30',
            '22:45' => '22:45',
            '23:00' => '23:00',
            '23:15' => '23:15',
            '23:30' => '23:30',
            '23:45' => '23:45',
        ];
    }
}