<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class CronJobController extends Controller
{
    public function cron_job_testing(){
        Blog::first()->update(['reject_reason'=>date('H:i').' '.rand(0,9).' new reason']);
        return response()->json(200);
    }
}
