<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class ProjectsPageController extends Controller
{

    public function __invoke()
    {
        $repos = Cache::get('github_repo');
        $colors = include(base_path('/resources/repo/colors.php'));
        return view('projects', ['repos' => $repos, 'colors' => $colors]);
    }
}
