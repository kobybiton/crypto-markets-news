<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use Validator;
use App\Articles;
use App\Tags;
use App\Banners;
use App\Category;
use DB;

class CmsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

	public function articleForm(){
    	return view('cms.add.article');
	}

    public function articles(){
        $articles = DB::table('articles')->where('deleted_at', null)->orderBy('updated_at', 'desc')->get();
        return view('cms.views.articles', ['articles' => $articles]);
    }

    public function storeArticle(Request $request){
        Articles::validator($request);
    }

    public function archivedArticles(){
        $rows = Articles::onlyTrashed()->get();
        return view('cms.archived.articles', ['rows' => $rows]);
    }

    public function updateArticleForm($id){

        $article = Articles::where('id', '=', $id)->first();
        $categories = Category::where('id', '!=', $article->category_id)->get();

        if($article){
            $article = $article->toArray();
        }

        return view('cms.update.article', [
            'article' => $article,
            'categories' => $categories,
        ]);
    }

    public function restoreArticle($id){

        $row = Articles::withTrashed()->find( $id);
        $row->restore();
        echo $row;
    }

    public function destroyArticle($id){

        $row = new Articles;
        $row = Articles::find( $id);
        $row->delete();
        echo $row;
    }

    public function updateBannerForm($id){
        $row = DB::table('banners')->where('id', $id)->get();
        $locations = DB::table('banners')->where('location', '!=', $row[0]->location)->get();
        return view('cms.update.banners', [
            'row' => $row,
            'locations' => $locations
        ]);
    }

    public function banners(){
        $rows = DB::table('banners')->where('deleted_at', null)->orderBy('location')->orderBy('sort')->get();
        return view('cms.views.banners', ['rows' => $rows]);
    }

    public function bannerForm() {
        return view('cms.add.banners');
    }

    public function storeBanner(Request $request){
        Banners::Validator($request);
    }

    public function sortBanner(Request $request){

        $id = $request->id;
        $sort = $request->sort;
        Banners::where('id', $id)->update(['sort' => $sort]);
    }

    public function archivedBanners(){
        $rows = Banners::onlyTrashed()->get();
        return view('cms.archived.banners', ['rows' => $rows]);
    }

    public function restoreBanner($id){

        $row = Banners::withTrashed()->find($id);
        $row->restore();
        echo $row;
    }

    public function destroyBanner($id){

        $row = new Banners;
        $row = Banners::find($id);
        $row->delete();
        echo $row;
    }

    public function categoryForm(){
        return view('cms.add.categories');
    }

    public function updateCategoryForm($id){
        $row = Category::where('id', '=', $id)->first();
        return view('cms.update.category', ['row' => $row]);
    }


    public function categories(){
        $categories = Category::all();
        return view('cms.views.categories', ['rows' => $categories]);
    }

    public function archivedCategories(){
        $rows = Category::onlyTrashed()->get();
        return view('cms.archived.categories', ['rows' => $rows]);
    }

    public function storeCategories(Request $request){
        Category::Validator( $request);
    }

    public function restoreCategories($id){

        $row = Category::withTrashed()->find( $id);
        $row->restore();
        echo $row;
    }

    public function destroyCategories($id){

        $row = Category::find( $id);
        $row->delete();
        echo $row;
    }

    public function tagsForm(){
        return view('cms.add.tags');
    }

    public function updateTagForm($id){
        $row = Tags::where('id', '=', $id)->first();
        return view('cms.update.tag', ['row' => $row]);
    }

    public function tags(){
        $rows = DB::table('tags')->where('deleted_at', null)->get();
        return view('cms.views.tags', ['rows' => $rows]);
    }

    public function storeTag(Request $request){
        Tags::Validator($request);
    }

    public function archivedTags(){
        $rows = Tags::onlyTrashed()->get();
        return view('cms.archived.tags', ['rows' => $rows]);
    }

    public function restoreTag($id){

        $row = Tags::withTrashed()->find($id);
        $row->restore();
        echo $row;
    }

    public function destroyTag($id){

        $row = new Tags;
        $row = Tags::find($id);
        $row->delete();
        echo $row;
    }

    public function comments(){

        $comments = DB::table('comments')
                  ->join('articles', 'articles.id', '=', 'comments.article_id')
                  ->select('comments.*', 'articles.id', 'articles.title', 'articles.url', 'articles.category_url')
                  ->orderBy('created_at', 'desc')
                  ->get();

        return view('cms.moderator.comments', [
            'comments' => $comments
        ]);
    }

    public function updateCommentsStatus(Request $request){
        Comments::where('id', $request->id)->update(['status_action' => $request->status_action]);
    }
}
