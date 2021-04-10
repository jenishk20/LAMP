<p><b>This is a system generated mail. Please do not reply to this email ID. If you have a query or need any
        clarification
        you may:<br>
        (1) Call our 24-hour Customer Care or<br>
        (2) Email Us at {{env('WEBSITE_OWNER_EMAIL')}}</b></p>

<h1>Ticket Confirmation</h1>
<br>
<hr>
<h2>Dear {{$user->name}}</h2>
<p>
    Congratulations! Thank you for using online rail reservation facility. Your e-ticket has been booked through
    IRCTC User Id: {{$user->name}} and the details are indicated below.

    Please take a screenshot of ERS i.e. Virtual Reservation Message(VRM) OF YOUR TICKET FROM YOUR Booked Tickets
    History page .You have to carry this VRM or SMS send to you along with any one from the listed identity cards (Voter
    Identity Card / Passport / PAN Card / Driving License / Photo ID card issued by Central / State Govt / Student
    Identity Card with photograph issued by recognized School or College for their students / Nationalised Bank Passbook
    with photograph / Credit Cards issued by Banks with laminated photograph) during train journey in original. Both
    these i.e SMS or VRM & original ID will be examined by ticket checking staff on stations/trains for verification
    purpose.
</p>
<br>
<hr>
<br>

<h2> {{('Ticket Details')}}</h2>
<table width="100%" cellpadding="5">
    <tbody>
    <tr>
        <td style="border-bottom:1px solid #ccc;font:12px Arial">
            <b>Train Name</b>

        </td>
        <td style="border-bottom:1px solid #ccc;font:12px Arial">
            <span>{{$train_name}}</span>

        </td>
        <td style="border-bottom:1px solid #ccc;font:12px Arial">
            <b>Date of Booking</b>

        </td>
        <td style="border-bottom:1px solid #ccc;font:12px Arial">
            <span><?php echo date('y-m-d')?></span>

        </td>
        <td style="border-bottom:1px solid #ccc;font:12px Arial">
            <b>Date of Journey</b>

        </td>
        <td style="border-bottom:1px solid #ccc;font:12px Arial">
            <span>{{$doj}}</span>

        </td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;font:12px Arial">
            <b>From</b>

        </td>
        <td style="border-bottom:1px solid #ccc;font:12px Arial">
            <span>{{$frms[0]->station_name}}</span>

        </td>
        <td style="border-bottom:1px solid #ccc;font:12px Arial">
            <b>To</b>

        </td>
        <td style="border-bottom:1px solid #ccc;font:12px Arial">
            <span>{{$trms[0]->station_name}}</span>

        </td>
        <td style="border-bottom:1px solid #ccc;font:12px Arial">
            <b>Reservation Upto</b>

        </td>
        <td style="border-bottom:1px solid #ccc;font:12px Arial">
            <span>{{$trms[0]->station_name}}</span>

        </td>
    </tr>
    </tbody>
</table>
<br>
<hr>
<hr>
<h2> {{('Passenger Details')}}</h2>
<table width="100%" cellpadding="5">
    <tbody>
    <tr align="left" style="background-color: #f0f3ff">
        <td style="font-size: 12px">
            <b>SI No.</b>
        </td>
        <td style="font-size: 12px">
            <b>Name</b>
        </td>
        <td style="font-size: 12px">
            <b>Age</b>
        </td>
        <td style="font-size: 12px">
            <b>Gender</b>
        </td>
        <td style="font-size: 12px">
            <b>Status</b>
        </td>
    </tr>


    @for($i=0;$i<count($age);$i++)
        <tr>
            <td style="border-bottom:1px solid #ccc;font:12px arial">
                {{$i+1}}
            </td>
            <td style="border-bottom:1px solid #ccc;font:12px arial">
                {{$name[$i]}}
            </td>
            <td style="border-bottom:1px solid #ccc;font:12px arial">
                {{$age[$i]}}
            </td>
            <td style="border-bottom:1px solid #ccc;font:12px arial">
                {{$gender[$i]}}
            </td>
            <td style="border-bottom:1px solid #ccc;font:12px arial">
                {{'CNF'}}
            </td>
        </tr>
    @endfor

    </tbody>
</table>
<br>
<hr>
<hr>
<h2> {{('Fare Details')}}</h2>
<table width="100%" cellpadding="5">
    <tbody>
    <tr>
        <td style="border-bottom:1px solid #ccc;font:12px arial"><b>Ticket Fare :</b></td>
        <td>{{'Rs.'}}  {{$tcost}}</td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;font:12px arial"><b>Service Charge :</b></td>
        <td>Rs. 0.00</td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;font:12px arial"><b>Total Charges :</b></td>
        <td>{{'Rs.'}} {{$tcost}}</td>
    </tr>
    </tbody>
</table>
<hr>
<br>
<br>
<hr>
<p>
    E-Ticket can be cancelled online till preparation of charts (which is normally 4 to 6 hours before the scheduled
    departure of the train from the originating stations. (For trains starting up to 12 noon the chart preparation is
    usually done on the previous night)) OR 4 hours before the scheduled departure of boarding the train in case of
    confirmed ticket OR 30 minutes before the scheduled departure of boarding the train in case of RAC/WL whichever is
    earlier
</p>
