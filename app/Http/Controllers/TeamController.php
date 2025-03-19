<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        // Search Query
        $search = $request->query('search');

        // Sorting
        $sort = $request->query('sort', 'name'); // Default sort by 'name'
        $direction = $request->query('direction', 'asc'); // Default direction 'asc'

        // Query Teams with search and sorting
        $teams = Team::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('stadium', 'like', "%{$search}%")
                ->orWhere('coach', 'like', "%{$search}%");
        })
            ->orderBy($sort, $direction)
            ->paginate(10); // Paginate with 10 items per page

        return view('teams.index', compact('teams'));
    }

    public function show($id)
    {
        $team = Team::with('players')->findOrFail($id);
        return view('teams.show', compact('team'));
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'stadium' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'coach' => 'required|string|max:255',
            'founded' => 'required|integer',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        Team::create([
            'name' => $request->name,
            'stadium' => $request->stadium,
            'logo' => $logoPath,
            'coach' => $request->coach,
            'founded' => $request->founded,
        ]);

        return redirect()->route('teams.index')->with('success', 'Team added successfully.');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'stadium' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'coach' => 'required|string|max:255',
            'founded' => 'required|integer',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $team->logo = $logoPath;
        }

        $team->update($request->only(['name', 'stadium', 'coach', 'founded']));

        return redirect()->route('teams.index')->with('success', 'Team updated successfully.');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team deleted.');
    }
}
