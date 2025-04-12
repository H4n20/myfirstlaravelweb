<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Constructor code can be added here if needed
    }

    public function index()
    {
        return view("backend.dashboard.index");

    }
}