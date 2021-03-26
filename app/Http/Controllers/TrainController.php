<?php

namespace App\Http\Controllers;

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

        $train = Train::query()->select('train_name', 'total_seats')->get();

        $station = Station::query()->select('station_name', 'id')->get();
        $result = array();

        $trips = Trip::query()->select()->where('source_station_id', '=', $from_id)->get();


        foreach ($trips as $trip) {

            $visited = [];
            $curr = $trip;
            $answer = [];
            $flag = 0;

            while (true){


                array_push($visited, $curr->source_station_id);


                $sql = Trip::query()->select()->where('train_id', '=', $curr->train_id)->where('source_station_id', '=', $curr->destination_station_id)->whereNotIn('destination_station_id', $visited)->get();


                if($sql->isEmpty())
                {
                    if($curr->destination_station_id!=$to_id) {
                        $flag = 1;

                    }
                    else
                    {
                        array_push($answer,$curr);
                    }
                    break;
                }
                else
                {
                    array_push($answer,$curr);
                    if($curr->destination_station_id==$to_id) {

                        break;

                    }
                    $curr=$sql[0];

                }



            }
            if ($flag==0)
                array_push($result, $answer);


        }
//       dd($result);
        return view('showTrains',compact('result'));
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
    public function show(Request  $request,Train $train)
    {
        //
        $stations=Station::query()->select('id','station_name')->get();

        return view('train',compact('stations'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Train $train
     * @return \Illuminate\Http\Response
     */
    public function edit(Train $train)
    {
        //
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
