<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap.xml file';

    public function handle()
    {
        // $sitemap = Sitemap::create();
        
        $path = base_path('../public_html/sitemap.xml');
        
        SitemapGenerator::create('https://pendataanhwdiprovinsilampung.my.id/')->writeToFile($path);
    
        // Sitemap::create()
        //     ->add(Url::create('/'))
        //     ->add(Url::create('/about'))
        //     ->add(Url::create('/contact'))
        //     ->writeToFile($path);
    
        // $this->info("Sitemap generated successfully! Saved to: {$path}");
    }

}
