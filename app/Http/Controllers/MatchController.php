<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;

class MatchController extends Controller
{
    public function index()
    {
        $matches = Match::latest()->get();
        return view('pages.fixtures', compact('matches'));
    }
}
