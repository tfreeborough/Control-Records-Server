@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="col-md-6">
                        <ul>
                            <a href="/bands"><li>Manage Bands</li></a>
                            <a href="/gigs"><li>Manage Gigs</li></a>
                            <a href="/venues"><li>Manage Venues</li></a>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4>Store Data</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
