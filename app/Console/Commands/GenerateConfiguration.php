<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class GenerateConfiguration
 *
 * @package App\Console\Commands
 */
class GenerateConfiguration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'config:gen {--H|ide-helper} {--I|info}'; // Means -H|--ide-helper, -I|--info

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates configuration file(s)';

    /**
     * Create a new command instance.d
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Determine whether to run ide-helper commands
        $isIdeHelper = $this->hasOption('H') || $this->option('ide-helper');

        // Determine whether to show info message ( uses in console )
        $isInfo = $this->hasOption('I') || $this->option('info');

        // php artisan clear-compiled
        $this->callSilent('clear-compiled');
        if ($isInfo) {
            $this->info('[clear-compiled] OK');
        }

        // php artisan responsecache:clear
//        $this->callSilent('responsecache:clear');
//        if ($isInfo) {
//            $this->info('[responsecache:clear] OK');
//        }

        // php artisan view:clear
        $this->callSilent('view:clear');
        if ($isInfo) {
            $this->info('[view:clear] OK');
        }

        // php artisan config:clear
        $this->callSilent('config:clear');
        if ($isInfo) {
            $this->info('[config:clear] OK');
        }

        // php artisan config:cache
        $this->callSilent('config:cache');
        if ($isInfo) {
            $this->info('[config:cache] OK');
        }

        // php artisan route:cache
        $this->callSilent('route:cache');
        if ($isInfo) {
            $this->info('[route:cache] OK');
        }

        // php artisan optimize --force ( deprecated since version 5.1 )
//        $this->callSilent('optimize --force');
//        $this->info('optimize --force... done!');

        // Only for a dev mode
        if ($isIdeHelper) {
            // php artisan ide-helper:generate
            $this->callSilent('ide-helper:generate');
            if ($isInfo) {
                $this->info('[ide-helper:generate] OK');
            }

            // php artisan ide-helper:models
            $this->call('ide-helper:models');
            if ($isInfo) {
                $this->info('[ide-helper:models] OK');
            }

            // php artisan ide-helper:meta
            $this->callSilent('ide-helper:meta');
            if ($isInfo) {
                $this->info('[ide-helper:meta] OK');
            }
        }

        if ($isInfo) {
            $this->info('[config:gen] OK');
        }
    }
}
