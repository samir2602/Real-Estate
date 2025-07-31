<?php

namespace App\Console\Commands;

use App\Models\Properties;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate sitemap';

    public function handle()
    {
        // Manually create sitemap
        $sitemap = Sitemap::create();

        // Static pages
        $sitemap->add('/');
        
        // Dynamic pages
        $properties = Properties::all();
        foreach ($properties as $propertie) {
            $sitemap->add("/property/{$propertie->property_slug}");
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}