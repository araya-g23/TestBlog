<?php
use App\Models\FootballMatch; // Use new model name

class MatchController extends Controller
{
    public function index()
    {
        $matches = FootballMatch::latest()->get(); // Use new model name
        return view('pages.fixtures', compact('matches'));
    }
}
