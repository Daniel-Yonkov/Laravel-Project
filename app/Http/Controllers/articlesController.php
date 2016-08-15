<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Auth;
use Session;

class articlesController extends Controller {

	public function __construct() {

		$this->middleware('auth', ['except' => ['index', 'show']]);
	}

	//List of all articles
	public function index() {
		$articles = Article::latest('published_at')->published()->get();
		return view('articles.index', compact('articles'));
	}
	//Article display
	public function show($id) {
		$article = Article::findOrFail($id);
		return view('articles.show', compact('article'));

	}
	//Article creation
	public function create() {
		$tags = Tag::lists('name', 'id');
		return view('articles.create', compact('tags'));
	}

	public function store(ArticleRequest $request) {
		$this->createArticle($request);
		Session::flash('flash_message', 'Your article has been created!');
		return redirect('articles');
	}

	public function edit($id) {
		dd(Auth::user()->username);
		$tags    = Tag::lists('name', 'id');
		$article = Article::findOrFail($id);
		return view('articles.edit', compact('article', 'tags'));

	}

	public function update($id, ArticleRequest $request) {
		$article = Article::findOrFail($id);
		$article->update($request->all());
		$tagIds = $request->input('tag_list'); //gets the tags
		$this->syncTags($article, $tagIds);
		return redirect('articles');

	}

	private function syncTags(Article $article, $tags) {
		$article->tags()->sync($tags); //updates pivot table article_id and tag_id
	}

	private function createArticle(ArticleRequest $request) {

		$article = Auth::user()->articles()->save(new Article($request->all())); //saves the article
		$tagIds  = $request->input('tag_list'); //gets the tags
		$this->syncTags($article, $tagIds); //saves pivot table article_id and tag_id
	}
}
