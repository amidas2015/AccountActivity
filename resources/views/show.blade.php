@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Last account activity (last 5 transactions):</div>
                <div class="panel-body">
                    <ul class="list-group">
                        @if (count($UserLoginHistory) > 0)
                            @foreach ($UserLoginHistory as $userloginhistory)
                                <li class="list-group-item">
                                <b>{{ $userloginhistory->created_at }}</b> from IP: <b>{{ $userloginhistory->user_ip }}</b>
                                </li>
                            @endforeach
                        @else
                            <li class="list-group-item">
                            No account activity
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
