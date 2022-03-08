<?php

namespace App\Console\Commands;

use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class UpdateGitHubCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update_github_cache:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ini_set('user_agent', 'Gramkina');
        $repos = GitHub::me()->repositories();
        Log::info('Data from GitHub has been received');
        Cache::flush();
        Cache::put('github_repo', $repos);
        foreach ($repos as $repo){
            $languagesJSON = file_get_contents($repo['languages_url']);
            Cache::put($repo['name'], $languagesJSON);
        }
        Log::info('GitHub cache has been updated');
    }
}
