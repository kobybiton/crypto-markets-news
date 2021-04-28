<?php

namespace App\Providers;

use App\Category;
use App\Tags;
use DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::all();
        $tags = Tags::all();
        $most_views_articles = DB::table('articles')->where('deleted_at', null)->orderBy('views', 'desc')->take(3)->get();
        $inner_pages_banner = DB::table('banners')->where('location', 'inner_pages')->where('deleted_at', null)->get();
        $side_bar_banner = DB::table('banners')->where('location', 'sidebar')->where('deleted_at', null)->get();

        view()->share([
            'categories' => $categories,
            'tags' => $tags,
            'most_views_articles' => $most_views_articles,
            'inner_pages_banner' => $inner_pages_banner,
            'side_bar_banner' => $side_bar_banner
        ]);
    }
}
