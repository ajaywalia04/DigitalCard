<?php

namespace App\Console\Commands;

use App\Models\AiBlog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CreateAIBlogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create-ai-blogs';

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
        Log::info('create');

        // Get all ai blog whose description is empty in blog
        $aiBlog = AiBlog::whereHas('blogs',function($query){
                $query->whereNull('description')
                    ->where('blog_type','AI');
        })->first();
        
        if($aiBlog){
                $aiBlog->blogs()->updateOrCreate( 
                    ["ai_blogs_id" => $aiBlog->id],
                    [
                        'description'=>'creating...'
                    ]
                );
    
                $aiBlog->createAiGeneratedDescription();
                $aiBlog->createAiGeneratedTags();
                $aiBlog->createAiGeneratedOutlineTitle();
                $aiBlog->createAiGeneratedTestimonials();
                $aiBlog->createAiGeneratedConclusion();
                $aiBlog->createAiGeneratedDisclaimer();
    
        }

        Log::info('created');
        
    }
}
