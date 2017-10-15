<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelpdeskValidator;
use App\Repositories\{CategoryRepository, HelpdeskRepository, StatusRepository, PriorityRepository};
use App\Repositories\Criteria\{GetUserTickets, SearchHelpdesk};
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\View\View;

/**
 * Class HelpdeskController
 *
 * @author  Tim Joosten <Topairy@gmail.com>
 * @license MIT LICENSE
 * @package App\Http\Controllers
 */
class HelpdeskController extends Controller
{
    private $helpdeskRepository; /** @var HelpdeskRepository $helpdeskRepository */
	private $categoryRepository; /** @var CategoryRepository $contactRepository  */
	private $statusRepository;   /** @var StatusRepository   $statusRepository   */
	private $priorityRepository; /** @var PriorityRepository $priorityRepository */

    /**
     * HelpdeskController constructor.
     *
     * @param  HelpdeskRepository $helpdeskRepository
     * @param  CategoryRepository $categoryRepository
     * @param  StatusRepository   $statusRepository
     * @param  PriorityRepository $priorityRepository
     *
     * @return void
     */
    public function __construct(
        HelpdeskRepository $helpdeskRepository,
		CategoryRepository $categoryRepository,
		StatusRepository   $statusRepository,
		PriorityRepository $priorityRepository
    ) {
        $routes = ['create', 'store', 'ticketsUser'];

        $this->middleware('auth')->except($routes);
        $this->middleware('role:admin')->except($routes);
        // $this->middleware('forbid-banned-user')->except($route); // TODO: build up and register the middleware.

        $this->helpdeskRepository = $helpdeskRepository;
		$this->categoryRepository = $categoryRepository;
		$this->statusRepository   = $statusRepository;
		$this->priorityRepository = $priorityRepository;
    }

    /**
     * Get the admin backend for the helpdesk.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(): View
    {
        return view('helpdesk.index', ['tickets' => $this->helpdeskRepository->paginate(20)]);
    }

    /**
     * Search for a specific ticket in the database.
     * @param  Request $input The user given input.
     * @return View
     */
    public function search(Request $input): View
    {
        $this->helpdeskRepository->pushCriteria(new SearchHelpdesk($input->get('term')));
        return view('helpdesk.search', ['tickets' => $this->helpdeskRepository->paginate(20)]);
    }

    /**
     * Create view for a new helpdesk ticket.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(): View
    {
        return view('helpdesk.index', [
            'tickets'    => $this->helpdeskRepository->entity()->where('author_id', auth()->user()->id)->paginate(20),
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
            flash(trans('flash-messages.helpdesk-ticket-change'))->success();
        }

        return back(302);
    }

    /**
     * Delete a helpdesk ticket in the system.
     *
     * @param  integer $helpdeskId The pimary key for the database table.
     * @return RedirectResponse
     */
    public function delete($helpdeskId): RedirectResponse
    {
        $ticket = $this->helpdeskRepository->find($helpdeskId);

        if ($this->helpdeskRepository->delete($helpdeskId)) {
            $ticket->categories()->sync([]);
            flash(trans('flash-messages.helpdesk-delete'))->success();
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
        $input->merge([
			// TODO: implementatie:  priority, status
			'author_id' => auth()->user()->id
			//! 'priority'  => $this->priorityRepository->
			//! 'status'    => $this->statusRepository->
		]);

        if ($this->helpdeskRepository->create($input->except(['_token']))) {
            flash(trans('flash-messages.helpdesk-store'))->success();
        }

        return back(302);
    }
}
