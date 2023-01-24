<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->first();
        if ($project) {
            response()->json([
                'success' => true,
                'project' => $project
            ]);
        } else {
            response()->json([
                'success' => false,
                'error' => 'Nessun progetto disponibile'
            ]);
        }
    }
}
