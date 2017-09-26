<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelpdeskValidator;
use App\Repositories\CategoryRepository;
use App\Repositories\Criteria\GetUserTickets;
use App\Repositories\Criteria\SearchHelpdesk;
use App\Repositories\HelpdeskRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class HelpdeskController
 *
 * @package App\Http\Controllers
 */
class HelpdeskController extends Controller
{
    private $helpdeskRepository; /** HelpdeskRepository $helpdeskrepository */
    private $categoryRepository; /** CategoryRepository $contactRepository  */

    /**
     * HelpdeskController constructor.
     *
     * @param  HelpdeskRepository $helpdeskRepository
     * @param  CategoryRepository $categoryRepository
     * @return void
     */
    public function __construct(HelpdeskRepository $helpdeskRepository, CategoryRepository $categoryRepository)
    {
        $routes = ['create', 'store', 'ticketsUser'];

        $this->middleware('auth')->except($routes);
        $this->middleware('role:admin')->except($routes);

        $this->helpdeskRepository = $helpdeskRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get the admin backend for the helpdesk.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(): View
    {
        return view('helpdesk.index', [
            'tickets' => $this->helpdeskRepository->paginate(20)
        ]);
    }

    /**
     * Search for a specific ticket in the database.
     * @param  Request $input The user given input.
     * @return View
     */
    public function search(Request $input): View
    {
        $this->helpdeskRepository->pushCriteria(new SearchHelpdesk($input->get('term')));

        return view('helpdesk.index', [
            'tickets' => $this->helpdeskRepository->paginate(20)
        ]);
    }

    /**
     * Create view for a new helpdesk ticket.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(): View
    {
        return view('helpdesk.create', [
            'categories' => $this->categoryRepository->findWhere(['module' => 'helpdesk'], ['id', 'name'])
        ]);
    }

    /**
     * The the helpdesk ticket in the database.
     *
     * @param  HelpdeskValidator $input The user given input. (validated)
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HelpdeskValidator $input): RedirectResponse
    {
        if ($this->helpdeskRepository->create($input->except['_token'])) {
            flash("Uw helpdesk ticket is opgeslagen. En zal spoedig behandeld worden.")->success();
        }

        return back(302);
    }

    /**
     * Get the tickets for the currently authencated user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ticketsUser(): View
    {
        $this->helpdeskRepository->pushCriteria(new GetUserTickets(auth()->user()->id));

        return view('helpdesk.index', [
            'tickets' => $this->helpdeskRepository->paginate(20)
        ]);
    }
}
