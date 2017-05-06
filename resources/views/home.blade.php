@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                        You are logged in!
                        </li>
                        @if (Auth::check())
                            <li class="list-group-item">
                            <a href="{{ url('/show') }}">Show account activity</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
