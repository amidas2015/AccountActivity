<?php

namespace AccountActivity\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use AccountActivity\UserLoginHistory;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        $UserLoginHistory = new UserLoginHistory();
        $UserLoginHistory->user_id = $user->id;
        $UserLoginHistory->user_ip = \DB::raw('INET_ATON(\''.($this->request->getClientIp()).'\')');
        $UserLoginHistory->save();
    }
}
