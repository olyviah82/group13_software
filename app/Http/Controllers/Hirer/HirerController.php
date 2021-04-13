<?php

namespace App\Http\Controllers\hirer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class HirerController extends Controller
{
    public function index()
    {
        if (Gate::denies('manage-courses')) {
            abort(403);
        }

        return view('hirer.hire.index');
    }
}