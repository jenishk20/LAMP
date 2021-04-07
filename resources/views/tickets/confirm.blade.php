@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{('Tickets Booked Successfully')}}
            </div>
            <div class="card-body">

                <table class="table table-responsive">

                    <tr>
                        <th>Passenger Name</th>
                        <th>Passenger Age</th>
                        <th>Passenger Sex</th>
                        <th>Ticket Status</th>
                    </tr>
                    @for($i=0;$i<count($name);$i++)
                        <tr>
                            <td>{{$name[$i]}}</td>
                            <td>{{$age[$i]}}</td>
                            <td>{{$gender[$i]}}</td>
                            <td>{{('Confirmed')}}</td>
                        </tr>
                    @endfor
                </table>

            </div>
        </div>
    </div>
@endsection

