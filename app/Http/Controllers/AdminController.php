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
    public function showTrains()
    {
        $trains=Train::query()->select()->get();
        return view('admin.showTrains',compact('trains'));
    }
    public function showStations()
    {
        $stations=Station::query()->select()->get();
        return view('admin.showStations',compact('stations'));
    }
    public function showTrips()
    {
        $trips=Trip::query()->select()->get();
        $train_name=[];
        $from_station=[];
        $to_station=[];
        foreach ($trips as $trip)
        {
            $sql=Train::query()->select()->where('id','=',$trip->train_id)->get();

            $sql1=Station::query()->select()->where('id','=',$trip->source_station_id)->get();
            $sql2=Station::query()->select()->where('id','=',$trip->destination_station_id)->get();

            array_push($train_name,$sql[0]->train_name);
            array_push($from_station,$sql1[0]->station_name);
            array_push($to_station,$sql2[0]->station_name);

        }


        return view('admin.showTrips',compact('trips','train_name','from_station','to_station'));
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
