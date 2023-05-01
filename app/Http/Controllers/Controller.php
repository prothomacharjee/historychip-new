<?php

namespace App\Http\Controllers;

use App\Models\NoticePrompt;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public $notices = null;

    public function __construct()
    {
        $currentDateTime = now()->format('Y-m-d H:i');
        $this->notices = NoticePrompt::where(function ($query) use ($currentDateTime) {
            $query->whereNull('duration_from')
                ->whereNull('duration_to')
                ->where('status', '=', 1)
                ->orWhere(function ($query) use ($currentDateTime) {
                    $query->where('duration_from', '<=', "$currentDateTime")
                        ->where('duration_to', '>=', "$currentDateTime")
                        ->where('status', '=', 1);
                });
        })->get();

    }
}
