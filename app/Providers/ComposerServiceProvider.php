<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Tag;

class ComposerServiceProvider extends ServiceProvider
{
    private $main, $menu, $userInfo, $tagCloud, $permission;

    public function __construct()
    {
        $this->main = [
            'admin.layout.sidebar',
            'admin.layout.breadcrumbs',
        ];

        $this->userInfo = [
            'admin.layout.sidebar',
            'admin.layout.header',
            'admin.user.personalEdit'
        ];

        $this->tagCloud = [
            'layouts.tag-cloud'
        ];
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $_user = \Auth::user();
            $view->with(compact('_user'));
        });

        view()->composer($this->tagCloud, function($view){
            $view->with('_tags',Tag::lists('title', 'mark')->toArray());
        });

        view()->composer($this->main, 'App\Http\ViewComposers\MainComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
