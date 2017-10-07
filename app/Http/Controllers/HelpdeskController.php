<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelpdeskValidator;
use App\Repositories\{CategoryRepository, HelpdeskRepository};
use App\Repositories\Criteria\{GetUserTickets, SearchHelpdesk};
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\View\View;

/**
 * Class HelpdeskController
 *
 * @author  Tim Joosten <Topairy@gmail.com>
 * @license
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
        // $this->middleware('forbid-banned-user')->except($route);

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
     * Change the status for the current ticket in the database.
     *
     * @param   integer $ticketId The unique identifuer in the database from the ticket.
     * @param   string  $status   The new status for the ticket.
     * @return  \Illuminate\Http\RedirectReponse
     */
    public function status($ticketId, $status): RedirectResponse
    {
        // TODO: Register the route in the AAD Client.

        if ($this->helpdeskRepository->update(['closed' => $status], $ticketId)) {
            flash("Het ticket zijn status is aangepast.")->success();
        }

        return back(302);
    }

    public function delete($helpdeskId): RedirectResponse
    {
        $ticket = $this->helpdeskRepository->find($helpdeskId);

        if ($this->helpdeskRepository->delete($helpdeskId)) {
            $ticket->categories()->sync([]);
            flash('Het helpdesk ticket is verwijderd uit het systeem.')->success();
        }

        return redirect()->back(302);
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
