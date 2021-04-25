@extends('layouts.header')
@section('jk')
    <div class="container mt-5">
        <div class="card">
            @include('flash-message')
            @yield('content')
        </div>
        <div class="card">
            <div class="card-header">
                <h4><b>Add Station Data</b></h4>
            </div>
            <div class="card-body">
                <form method="post" action="/admin/addStation/confirm">
                    @csrf
                    <div class="form-group row">
                        <label for="sname" class="col-4 col-form-label">Station Name</label>
                        <div class="col-8">
                            <input id="sname" name="sname" placeholder="Enter Name of Station" type="text"
                                   required="required" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hlp" class="col-4 col-form-label">Station Helpline Number</label>
                        <div class="col-8">
                            <input id="hlp" name="hlp" type="text" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
