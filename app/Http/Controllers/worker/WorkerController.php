<?php

namespace App\Http\Controllers\worker;

use App\Http\Controllers\Controller;

class WorkerController extends Controller
{

    public function index()
    {
        return view('worker.work.index');
    }
}