<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Station;
use App\Models\Train;
use App\Models\Trip;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class TrainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {

        $from_id = $request->input('from');
        $to_id = $request->input('to');
        $doj = $request->input('date');


        $request->session()->put('from', $from_id);
        $request->session()->put('to', $to_id);
        $request->session()->put('doj', $doj);


        $train = Train::query()->select('train_name', 'total_seats')->get();

        $station = Station::query()->select('station_name', 'id')->get();
        $result = array();
        $total = array();
        $trips = Trip::query()->select()->where('source_station_id', '=', $from_id)->get();


        foreach ($trips as $trip) {

            $visited = [];
            $curr = $trip;
            $answer = [];
            $flag = 0;

            while (true) {


                array_push($visited, $curr->source_station_id);


                $sql = Trip::query()->select()->where('train_id', '=', $curr->train_id)->where('source_station_id', '=', $curr->destination_station_id)->whereNotIn('destination_station_id', $visited)->get();


                if ($sql->isEmpty()) {
                    if ($curr->destination_station_id != $to_id) {
                        $flag = 1;

                    } else {
                        array_push($answer, $curr);
                    }
                    break;
                } else {
                    array_push($answer, $curr);
                    if ($curr->destination_station_id == $to_id) {

                        break;

                    }
                    $curr = $sql[0];

                }


            }
            if ($flag == 0)
                array_push($result, $answer);


        }
//       dd($result);
        $avail = PHP_INT_MAX;
        foreach ($result as $results) {

            foreach ($results as $trip) {

                $sql = Booking::query()->select()->where('trip_id', '=', $trip->id)->where('date', '=', $doj)->get();

                if ($sql->isEmpty()) {
                    $booking = new Booking();
                    $booking->trip_id = $trip->id;
                    $booking->date = $doj;
                    $booking->trip_availability = $trip->train->total_seats;
                    $booking->save();
                    $avail = min($avail, $booking->trip_availability);


                } else {
                    $booking = $sql[0];

                    $avail = min($avail, $booking->trip_availability);
                }

            }

        }

//        dd($avail);
        $request->session()->put('result', $result);
        return view('showTrains', compact('result', 'avail', 'from_id', 'to_id'));
        //return view('train', compact('train', 'trip', 'station'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Train $train
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Train $train)
    {
        //

        $stations = Station::query()->select('id', 'station_name')->get();

        return view('train', compact('stations'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Train $train
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $request->session()->put('result_idx', $id);
        $train_id = session()->get('result')[$id][0]->train_id;
        $trip = session()->get('result')[$id];
//        dd($trip);
        $trip_cost = 0;
        foreach ($trip as $journey) {
            $trip_cost += ($journey->trip_cost);

        }

        $frm = session()->get('from');
        $to = session()->get('to');
        $train_name = Train::query()->select('train_name')->where('id', '=', $train_id)->get()[0]->train_name;

        $frms = Station::query()->select('station_name')->where('id', '=', $frm)->get();
        $trms = Station::query()->select('station_name')->where('id', '=', $to)->get();

        return view('tickets.passenger', compact('frms', 'trms', 'train_name', 'trip_cost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Train $train
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Train $train)
    {
        //
        $arr = $_GET['name'];

        $count = count($arr);
        $idx = session()->get('result_idx');
        $trip = session()->get('result')[$idx];
        $doj = session()->get('doj');

        foreach ($trip as $journey) {

            $sql = Booking::query()->select()->where('trip_id', '=', $journey->id)->where('date', '=', $doj)->get();


            $avail = $sql[0]->trip_availability;
            if($count<=$avail)
            {
                $sql[0]->trip_availability-=$count;
                $sql[0]->save();



            }


        }

        return view('tickets.confirm');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Train $train
     * @return \Illuminate\Http\Response
     */
    public function destroy(Train $train)
    {
        //
    }
}
