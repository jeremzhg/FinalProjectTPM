<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index(Request $request)
{
    if (Auth::user()->team_name !== 'Admin Team') {
        return redirect('/')->with('error', 'Unauthorized');
    }
    // Search and sort
    $search = $request->input('search');
    $sort = $request->input('sort', 'name_asc'); // Default sort by name

    $query = User::query();

    if ($search) {
        $query->where('team_name', 'like', '%' . $search . '%');
    }

    // Sorting types
    if ($sort === 'name_asc') {
        $query->orderBy('team_name', 'asc');
    } elseif ($sort === 'name_desc') {
        $query->orderBy('team_name', 'desc');
    } elseif ($sort === 'date_newest') {
        $query->orderBy('created_at', 'desc');
    } elseif ($sort === 'date_oldest') {
        $query->orderBy('created_at', 'asc');
    }

    $teams = $query->paginate(10);

    return view('admin.index', compact('teams', 'search', 'sort'));
}


    // Show team details
    public function show($id)
    {
        if (Auth::user()->team_name !== 'Admin Team') {
            return redirect('/')->with('error', 'Unauthorized');
        }

        $team = User::findOrFail($id);
        return view('admin.show', compact('team'));
    }

    // Edit teams
    public function edit($id)
    {
        if (Auth::user()->team_name !== 'Admin Team') {
            return redirect('/')->with('error', 'Unauthorized');
        }

        $team = User::findOrFail($id);
        return view('admin.edit', compact('team'));
    }

    // Update teams
    public function update(Request $request, $id)
    {
        if (Auth::user()->team_name !== 'Admin Team') {
            return redirect('/')->with('error', 'Unauthorized');
        }

        $team = User::findOrFail($id);
        $team->update($request->all());
        return redirect()->route('admin.index')->with('success', 'Team updated successfully.');
    }

    // Delete teams
    public function destroy($id)
    {
        if (Auth::user()->team_name !== 'Admin Team') {
            return redirect('/')->with('error', 'Unauthorized');
        }

        $team = User::findOrFail($id);
        $team->delete();
        return redirect()->route('admin.index')->with('success', 'Team deleted successfully.');
    }
}
