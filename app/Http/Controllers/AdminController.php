<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Train;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public  function  index()
    {
        $users=User::all();

        return view('admin.index');
    }
    public function addTrain()
    {

        return view('admin.addTrain');
    }

    public function addStation()
    {

        return view('admin.addStation');
    }
    public function addTrip()
    {
        $trains=Train::query()->select()->get();
        $stations=Station::query()->select()->get();


        return view('admin.addTrip',compact('trains','stations'));
    }

    public function confirmTrain(Request $request)
    {
        $train_name=$request->get('tname');
        $seats=$request->get('seats');

        $sql=Train::query()->select()->where('train_name','=',$train_name)->get();

        if($sql->isEmpty())
        {
            $train=new Train();
            $train->train_name=$train_name;
            $train->total_seats=$seats;

            $train->save();
            return back()->with('success','Train Data Inserted Successfully');
        }
        else
        {
            return back()->with('info','Train Already Exists');
        }


    }
    public function confirmStation(Request $request)
    {
        $name=$request->get('sname');
        $contact=$request->get('hlp');

        $sql=Station::query()->select()->where('station_name','=',$name)->get();

        if($sql->isEmpty())
        {
            $station=new Station();
            $station->station_name=$name;
            $station->contact_number=$contact;

            $station->save();
            return back()->with('success','Station Data Inserted Successfully');
        }
        else
        {
            return back()->with('info','Station with same name Already Exists');
        }

    }
    public function confirmTrip(Request $request)
    {
        $trainId=$request->get('tname');
        $sourceStationId=$request->get('sstat');
        $destStationId=$request->get('dstat');
        $cost=$request->get('tcost');
        $deptTime=$request->get('stime');
        $aTime=$request->get('dtime');

        $sql=Trip::query()->select()->where('train_id','=',$trainId)->
            where('source_station_id','=',$sourceStationId)->
            where('destination_station_id','=',$destStationId)->
            get();

        if($sql->isEmpty())
        {
            $trip=new Trip();
            $trip->train_id=$trainId;
            $trip->source_station_id=$sourceStationId;
            $trip->destination_station_id=$destStationId;
            $trip->trip_cost=$cost;
            $trip->source_departure_time=$deptTime;
            $trip->destination_arrival_time=$aTime;

            $trip->save();
            return back()->with('success','Trip Data Inserted Successfully');
        }
        else
        {
            return back()->with('info','Station with same name Already Exists');
        }


    }


}
