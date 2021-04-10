@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        {{ __('Welcome!') }}

                        {{$user->name}}

                </div>


            </div>

            <div class="card">

                <div class="card-header">{{('BOOK TICKET NOW')}}</div>
                <div class="card-body">
                    <form method="get" action="/home/search">
                        @csrf
                        <div class="form-group row">
                            <label for="from" class="col-4 col-form-label">From</label>
                            <div class="col-8">
                                <select id="from" name="from" required="required" class="custom-select">
                                    <option value="NDLS">New Delhi</option>
                                    <option value="BCT">Mumbai Central</option>
                                    <option value="ADI">Ahmedabad</option>
                                    <option value="HWH">Howrah</option>
                                    <option value="PNBE">Patna</option>
                                    <option value="ST">Surat</option>
                                    <option value="BL">Valsad</option>
                                    <option value="BRC">Vadodara</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="to" class="col-4 col-form-label">To</label>
                            <div class="col-8">
                                <select id="to" name="to" class="custom-select" required="required">
                                    <option value="NDLS">New Delhi</option>
                                    <option value="BL">Valsad</option>
                                    <option value="ADI">Ahmedabad</option>
                                    <option value="BRC">Vadodara</option>
                                    <option value="PNBE">Patna</option>
                                    <option value="BCT">Mumbai Central</option>
                                    <option value="HWH">Howrah</option>
                                    <option value="ST">Surat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="doj" class="col-4 col-form-label">Date of Journey</label>
                            <div class="col-8">
                                <input type="date" id="doj" name="date"  min="2021-3-23" max="2021-6-31">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button name="submit" type="submit" class="btn btn-primary">Search Trains</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
