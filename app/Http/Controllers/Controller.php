<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\NoticePrompt;
use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\isNull;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public $notices = null;
    public $pages = null;

    public function __construct()
    {
        if (strpos(Route::currentRouteName(), 'admin.') === 0) {

        } else {

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


            // // Get the current route name
            // $routeName = Route::currentRouteName();
            // // Get the current URL
            $url = url()->current(); //Route::current()->uri();
            $basePath = url('/');
            $pathAfterBase = str_replace($basePath, '', $url);

            $this->pages = Page::where('url', $pathAfterBase)->first();

            if (is_null($this->pages)) {
                abort('404');
            }
            // dd($this->pages);
        }
    }
}
