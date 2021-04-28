<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Category;
use App\Comments;
use App\General;
use DB;

class PagesController extends Controller
{
    public function index() {

        $latest_main_news = DB::table('articles')->where('category_name', 'News')->where('deleted_at', null)->orderBy('date', 'desc')->first();
        $latest_news = $latest_main_news ? DB::table('articles')->where('id', '!=', $latest_main_news->id)->where('deleted_at', null)->orderBy('date', 'desc')->take(10)->get(): [];
        $home_page_top_banner = DB::table('banners')->where('location', 'home_page_top')->where('deleted_at', null)->get();
        $home_page_bottom_banner = DB::table('banners')->where('location', 'home_page_bottom')->where('deleted_at', null)->get();

        return view('index', [
            'latest_main_news' => $latest_main_news,
            'latest_news' =>$latest_news,
            'home_page_top_banner' => $home_page_top_banner,
            'home_page_bottom_banner' => $home_page_bottom_banner
        ]);
    }

    public function articles($category_url) {

        $category_url = General::xss_clean($category_url);

        if($category_url) {

            $category = Category::where('url', '=', $category_url)->first();
            $category = $category ? $category : $category_url;
            $articles = is_object($category) ? Category::find($category['id'])->articles->sortByDesc('date') : null;
            $articles = $articles ? $articles->toArray() : null;
        }

        return view('inner_pages.articles', [
            'articles' => $articles,
            'category' => $category
        ]);
    }

    public function article($category_url, $article_url, $article_id){

        $article_url = General::xss_clean($article_url);
        $views = DB::table('articles')->select('views')->where('id','=', $article_id)->get();
        DB::table('articles')->where('id', $article_id)->update(['views' => $views[0]->views + 1]);

        if($article_url){

            $article = Articles::where('id', '=', $article_id)->first();
            $comments = Comments::where('article_id', '=', $article_id)
                                ->where('status_action', '=', 1)
                                ->get();

            if($article){
                $article = $article->toArray();
            }
        }

        return view('inner_pages.article', [
            'article' => $article,
            'article_url' => $article_url,
            'category_url' => $category_url,
            'comments' => $comments
        ]);
    }

    public function marketCap(){
        return view('inner_pages.market_cap');
    }

    public function coinInfo(){
        return view('inner_pages.coin_info');
    }

    public function aboutUS(){
        return view('inner_pages.about_us');
    }

    public function privacyPolicy(){
        return view('inner_pages.privacy_policy');
    }

    public function termsOfService(){
        return view('inner_pages.terms_of_service');
    }

    public function cookiePolicy(){
        return view('inner_pages.cookie_policy');
    }

    public function advertise(){
        return view('inner_pages.advertise');
    }

    public function redirect($old_id, $article_url) {

        $article = Articles::where('old_id','=', $old_id)->first();
        return redirect(url($article->category_url .'/'. $article_url . '/'. $article->id));
    }
}
