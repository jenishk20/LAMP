<?php

namespace App\Mail;

use App\Models\Station;
use App\Models\Train;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name = [];
    public $age = [];
    public $gender = [];
    public $mobile;


    public function __construct(Request $request)
    {
        //
        $this->name = $request->input('name');
        $this->age = $request->input('age');
        $this->gender = $request->input('gender');
        $this->mobile = $request->input('mobile');




    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $user = Auth::user();
        $name=$this->name;
        $age=$this->age;
        $gender=$this->gender;
        $idx = session()->get('result_idx');
        $journey = session()->get('result')[$idx];
        $train_id = session()->get('result')[$idx][0]->train_id;
        $frm = session()->get('from');
        $to = session()->get('to');
        $doj=session()->get('doj');
        $train_name = Train::query()->select('train_name')->where('id', '=', $train_id)->get()[0]->train_name;
        $tcost=0;
        foreach($journey as $trip)
        {
            $tcost+=$trip->trip_cost;
        }

        $tcost=$tcost*count($age);

        $frms = Station::query()->select('station_name')->where('id', '=', $frm)->get();
        $trms = Station::query()->select('station_name')->where('id', '=', $to)->get();

        return $this->subject('New Mail')->from(getenv('MAIL_FROM_ADDRESS'))->to($user->email)->
        view('email.confirmMail',compact('user','doj','tcost','name','age','gender','journey','train_name','frms','trms'));
    }
}
