@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            @include('flash-message')
            @yield('content')
        </div>
        <div class="card">
            <div class="card-header">
                {{('Travel Details')}}
            </div>
            <div class="card-body">

                {{--                    {{dd(session()->get('result'))}}--}}
                <div class="form-group row">
                    <label for="train" class="col-4 col-form-label">Train Name</label>
                    <div class="col-8">
                        <div class="input-group">
                            {{--                                {{dd($frms)}}--}}
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
        <div class="card">
            <div class="card-header">
                {{('Passenger Details')}}
            </div>
            <div class="card-body">
                <form method="post" action="/book/confirmation">
                    @csrf
                    <div class="form-group row">
                        <label for="mobile" class="col-4 col-form-label">Mobile Number</label>
                        <div class="col-8">
                            <input id="mobile" name="mobile" type="text" class="form-control"
                                   placeholder="Enter 10 Digit Mobile Number" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <table id="dataTable" class="table table-responsive">
                            <tbody>
                            <tr>

                                <td>
                                    <input type="checkbox" name="chk[]"/>
                                </td>
                                <td>
                                    <label>Name</label>
                                    <input type="text" name="name[]">
                                </td>
                                <td>
                                    <label for="age">Age</label>
                                    <input type="text" name="age[]">
                                </td>
                                <td>
                                    <label for="gender">Gender</label>
                                    <select name="gender[]">

                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </td>


                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="form-group row text-right mx-auto">
                        <div class="col-8">
                            <input type="button" value="Add Passenger" onClick="addRow('dataTable');calc('dataTable')"/>
                            <input type="button" value="Remove Passenger" onClick="deleteRow('dataTable');calcDel('dataTable')"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tcost" class="col-4 col-form-label">Trip Cost</label>
                        <div class="col-8">
                            <input id="tcost" name="tcost" value="{{$trip_cost}}" disabled type="number" class="form-control">
                        </div>
                    </div>



                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button class="btn btn-primary">Book Ticket Now</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>


        <script>
            function  calc(tableID)
            {

                var curr={{$trip_cost}};
                document.getElementById("tcost").defaultValue =curr;
                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;

                curr*=rowCount;

                document.getElementById('tcost').value=curr;
            }
            function calcDel(tableID)
            {
                var curr={{$trip_cost}};
                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;

                curr*=rowCount;

                document.getElementById('tcost').value=curr;
            }
            function addRow(tableID) {
                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;
                if (rowCount < 3) {
                    var row = table.insertRow(rowCount);
                    var colCount = table.rows[0].cells.length;
                    for (var i = 0; i < colCount; i++) {
                        var newcell = row.insertCell(i);
                        newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                    }
                } else {
                    alert("Maximum Passenger per ticket is 3");

                }
            }

            function deleteRow(tableID) {
                try {
                    var table = document.getElementById(tableID);
                    var rows = table.rows.length;

                    for (var i = 0; i < rows; i++) {
                        var row = table.rows[i];
                        var chkbox = row.cells[0].childNodes[1];


                        if (chkbox != null && chkbox.checked == true) {

                            if (rows <= 1) {
                                alert("Cannot Remove all the Passenger.");
                                break;
                            }
                            table.deleteRow(i);
                            rows--;
                            i--;
                        }
                    }
                } catch (e) {
                    alert(e);
                }
            }
        </script>
@endsection
