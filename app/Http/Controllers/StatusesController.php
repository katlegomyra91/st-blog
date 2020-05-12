<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

class StatusesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $statuses = Status::all();
        return $statuses;
    }
}
