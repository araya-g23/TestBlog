<?php

namespace App\Http\Controllers;

use App\Models\FootballMatch;  // Ensure this is correct
use App\Http\Controllers\Controller; // ✅ Add this import

class MatchController extends Controller
{
    public function index()
    {
        $matches = FootballMatch::latest()->get();  // Ensure this model exists
        return view('pages.fixtures', compact('matches'));
    }
}
