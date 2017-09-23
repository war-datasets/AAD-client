<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\NewsValidator;
use App\Repositories\{
    CategoryRepository, NewsRepository, UsersRepository
};

/**
 * Class NewsController
 *
 * @package App\Http\Controllers
 */
class NewsController extends Controller
{
    private $newsRepository;        /** NewsRepository      $newsRepository     */
    private $categoryRepository;    /** CategoryRepository  $categoryRepository */
    private $usersRepository;       /** UsersRepository     $usersRepository    */

    /**
     * NewsController constructor.
     *
     * @param  NewsRepository       $newsRepository     The database abstraction layer for the news messages.
     * @param  CategoryRepository   $categoryRepository The database abstraction layer for the news categories.
     * @param  UsersRepository      $usersRepository    The database abstraction layer for the users.
     *
     * @return void
     */
    public function __construct(
        NewsRepository      $newsRepository,
        CategoryRepository  $categoryRepository,
        UsersRepository     $usersRepository
    ) {
        $routes = ['show', 'index'];

        $this->middleware('auth')->except($routes);
        // $this->middleware('') TODO; Implement middleware for admin access.
        // $this->middleware('forbid-banned-user')->except($routes);

        $this->newsRepository       = $newsRepository;
        $this->categoryRepository   = $categoryRepository;
        $this->usersRepository      = $usersRepository;
    }

    /**
     * Display the index page for the news section.
     * --
     * Admin's will be automatically redirected to the admin view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $messages   = $this->newsRepository->with(['author', 'categories'])->all();
        $categories = $this->categoryRepository->findWhere(['module' => 'news'], ['id', 'name']);

        if (auth()->check() && $this->usersRepository->isAdmin()) {
            // Admin's get automatically the management view.
            // Because sometimes they need more functions than normal users.
            return view('news.admin', compact('messages'));
        }

        return view('news.index', compact('messages', 'categories'));
    }

    /**
     * Display the news message in the application.
     *
     * @param  integer $newsId The unique identifier in the database for the news message.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($newsId)
    {
        return view('news.show', [
            'message' => $this->newsRepository->with(['author', 'categories'])->find($newsId)
        ]);
    }

    /**
     * Display the creation view for a new news message.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('news.create', [
            'categories' => $this->categoryRepository->findWhere(['module' => 'news'], ['id', 'name'])
        ]);
    }

    /**
     * Store a new news message in the database.
     *
     * @param  NewsValidator $input The user given input fields (validated).
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewsValidator $input)
    {
        if ($message = $this->newsRepository->create($input->except(['_token']))) {
            flash('Het nieuws bericht is toegevoegd')->success();
            return redirect()->route('news.show', $message);
        }

        flash('Er is iets mis gelopen. Wij konden helaas het nieuwsbericht niet toevoegen.')->danger();
        return back(302);
    }

    /**
     * Display the edit page for a news message.
     *
     * @param  integer $newsId The unique identifier for the news message in the database.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($newsId)
    {
        // TODO: write controller logic.
    }

    /**
     * @todo docblock
     */
    public function status($newsId, $status)
    {
        // TODO: write controller logic.
    }

    /**
     * Update a news message in the database.
     *
     * @param  NewsValidator $input  The user given input (validated)
     * @param  Integer       $newsId The unique identifier from the news message in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NewsValidator $input, $newsId)
    {
        // TODO: write controller logic.
    }

    /**
     * Delete a news message in the database.
     *
     * @param  Integer $newsId The unique identifier from the news message in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($newsId)
    {
        // TODO: write controller logic.
    }
}
