<p>This is a system generated mail. Please do not reply to this email ID. If you have a query or need any clarification
    you may:<br>
    (1) Call our 24-hour Customer Care or<br>
    (2) Email Us at {{env('WEBSITE_OWNER_EMAIL')}}</p>

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

<hr>

<div class="card">
    <div class="card-header">
        <h2> {{('Travel Details')}}</h2>
    </div>
    <div class="card-body">


        <div class="form-group row">
            <label for="train" class="col-4 col-form-label">Train Name</label>
            <div class="col-8">
                <div class="input-group">

                    <input id="train" name="train" disabled value="{{$train_name}}" type="text"
                           class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="boarding " class="col-4 col-form-label">Boarding From</label>
            <div class="col-8">
                <input id="boarding " name="boarding " disabled value="{{$frms[0]->station_name}}" type="text"
                       class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="to" class="col-4 col-form-label">To</label>
            <div class="col-8">
                <input id="to" name="to" disabled value="{{$trms[0]->station_name}}" type="text"
                       class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="doj" class="col-4 col-form-label">Date of Journey</label>
            <div class="col-8">
                <input id="doj" name="doj" disabled value="{{session()->get('doj')}}" type="text"
                       class="form-control">
            </div>
        </div>

    </div>
</div>
<hr>
<b>Name:</b>
<hr>
<b>Email:</b>
<hr>
<b>Message:</b>
<hr>
Thank You

