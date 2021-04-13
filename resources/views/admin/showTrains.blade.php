@extends('layouts.header')
@section('jk')
    <div class="container mt-5">
        <table class="table table-striped table-hover text-dark" style="font-size:large">
            <thead>
            <tr>

                <th scope="col">#</th>
                <th scope="col">Train Name</th>
                <th scope="col">Total Seats Available</th>
                <th scope="col">Started From</th>
            </tr>
            </thead>
            <tbody>


            @for($i=0;$i<count($trains);$i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$trains[$i]->train_name}}</td>
                    <td>{{$trains[$i]->total_seats}}</td>
                    <td>{{$trains[$i]->created_at}}</td>
                </tr>
            @endfor


            </tbody>
        </table>
    </div>
@endsection
