<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

// Services
use App\Services\StationServices;

class StationController extends Controller
{
    private $station;

    public function __construct(StationServices $station)
    {
        $this->station = $station;
    }

        // Delete Station
    public function deleteStation($id)
    {
        $data = $this->station->deleteStation($id);

        return response()->json(compact('data'));
    }

    // Submit new station
    public function submitStation()
    {
        $request = \Request::all();
        unset($request['_token']);
        $data = $this->station->submitStation($request);

        return redirect('new-station')
                    ->with('status', $data['status'])
                    ->with('message', $data['message']);
    }
  

    // Display station form
    public function stationForm()
    {
        $data = [
            "header" => "Station Form",
            "title" => "Station Form"
        ];

        return view('admin.station.create-station', compact('data'));
    }

    // Display stations
    public function stations()
    {
        $data = [
            "header" => "Stations",
            "title" => "Stations",
            "stations" => $this->station->getStations()
        ];

        return view('admin.station.stations', compact('data'));
    }
}

