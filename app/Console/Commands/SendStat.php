<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Comment;
use App\Models\Click;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\StatMail;

class SendStat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-stat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $article_counts = Click::all()
        ->groupBy('article_id')
        ->map(function($group) {
            return [
                'article_id' => $group->first()->article_id,
                'article_title' => $group->first()->article_title,
                'count' => $group->count()
            ];
        })
        ->values();
        if ($article_counts->isEmpty()) {
            $this->info('No clicks recorded today.');
        }
        Click::whereNotNull('article_id')->delete();
        $comments = Comment::whereDate('created_at', Carbon::today())->count();
        Mail::to('rebrrova.nastya@gmail.com')->send(new StatMail($comments, $article_counts));
        $this->info('Email sent successfully!');
    }
}