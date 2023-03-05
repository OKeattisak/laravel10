<?php

use Illuminate\Support\Facades\Auth;


function getLogInUser()
{
    return Auth::user();
}

function getLogInUserId()
{
    static $authUser;
    if (empty($authUser)) {
        $authUser = Auth::user();
    }

    return $authUser->id;
}
