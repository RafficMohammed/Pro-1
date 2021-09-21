<?php

namespace App\Exceptions;

use Exception;

class NoEmailException extends Exception
{
    //
    function report()
    {

    }

    function render()
    {
        return back()->with('nopage','Email is not registered');
    }
}
