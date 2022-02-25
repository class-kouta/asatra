<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

class PostsStatusSet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'postsStatusSet:postStatusSet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'postsの全レコードのstatusに0を挿入';

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
     * @return mixed
     */
    public function handle()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            $post->status = 0;
            $post->save();
        }
    }
}
