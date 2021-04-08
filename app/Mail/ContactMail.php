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
    public $tcost;

    public function __construct(Request $request)
    {
        //
        $this->name = $request->get('name');
        $this->age = $request->get('age');
        $this->gender = $request->get('gender');
        $this->mobile = $request->get('mobile');
        $this->tcost = $request->get('tcost');



    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = Auth::user();
        $name[]=$this->name;
        $age[]=$this->age;
        $gender[]=$this->gender;
        $idx = session()->get('result_idx');
        $journey = session()->get('result')[$idx];
        $train_id = session()->get('result')[$idx][0]->train_id;
        $frm = session()->get('from');
        $to = session()->get('to');

        $train_name = Train::query()->select('train_name')->where('id', '=', $train_id)->get()[0]->train_name;

        $frms = Station::query()->select('station_name')->where('id', '=', $frm)->get();
        $trms = Station::query()->select('station_name')->where('id', '=', $to)->get();

        return $this->subject('New Mail')->from(getenv('MAIL_FROM_ADDRESS'))->to($user->email)->
        view('email.confirmMail',compact('user','name','age','gender','train_name','frms','trms'));
    }
}
