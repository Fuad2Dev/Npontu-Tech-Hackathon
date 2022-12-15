<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $activities = Activity::with('tasks', 'assignees')->get();
        return view('dashboard', compact('activities'));
    }
}
