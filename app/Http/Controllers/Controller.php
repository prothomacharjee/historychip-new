<?php

namespace App\Http\Controllers;

use App\Models\NoticePrompt;
use App\Models\Page;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public $notices = null;
    public $pages = null;

    public function __construct()
    {
        if (strpos(Route::currentRouteName(), 'admin.') === 0 || strpos(Route::currentRouteName(), 'api.') === 0) {

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
            $routeExists = false;



            foreach (Route::getRoutes() as $route) {

                if ($route->uri === str_replace('/','', $pathAfterBase)) {
                    $routeExists = true;
                    break;
                }
            }


            // if (is_null($this->pages)) {
            //     abort('404');
            // }
            // else{

            // }
            // dd($this->pages);
        }
    }
}
