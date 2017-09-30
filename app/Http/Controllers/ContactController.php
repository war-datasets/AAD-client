<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactValidator;
use App\Repositories\CategoryRepository;
use App\Repositories\ContactRepository;
use Illuminate\Http\{Request, RedirectResponse};
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

/**
 * Class ContactController
 *
 * @author  Tim Joosten <Topairy@gmail.com>
 * @license MIT License
 * @package App\Http\Controllers
 */
class ContactController extends Controller
{
    private $categoryRepository; /** @var CategoryRepository $categoryRepository */
    private $contactRepository;  /** @var ContactRepository  $contactRepository  */

    /**
     * ContactController Constructor
	 *
     * @param  CategoryRepository $categoryRepository The abstraction layer for the category db model.
	 * @param  ContactRepository  $contactRepository  The abstraction layer for the contact db model.
     *
	 * @return void
     */
    public function __construct(ContactRepository $contactRepository, CategoryRepository $categoryRepository)
    {
        $this->middleware('auth')->except(['create', 'store']);
        // $this->>middleware('forbid-banned-users'); // TODO: Build up and register the middleware.

        $this->categoryRepository = $categoryRepository;
        $this->contactRepository  = $contactRepository;
    }

    /**
     * Get the dashboard for the contact messages.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $relations = ['author', 'relations'];

        return view('contact.index', [
            'messages' => $this->contactRepository->with($relations)->paginate(50)
        ]);
    }

	/**
	 * The index page for the contact form.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function create(): View
    {
    	return view('contact.create');
    }

    /**
     * Store the contact form in the database.
     *
     * @param  ContactValidator $input The user given input. (validated)
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContactValidator $input): RedirectResponse
    {
    	// 1. Store in support desk.
    	// 2. Redirect user and display a flash messsage.

    	// IDEAS:
    	// 4. If user is authencated store the ticket in the helpdesk db table. with the category contact.

        return "<code>TODO</code>";
    }

    /**
     * Display a specific message in the system.
     *
     * @param  integer $contactId The primary key form the message in the storage.
     * @return View
     */
    public function show($contactId): View
    {
        $message = $this->contactRepository->find($contactId) ?: abort(404);
        return view('contact.show', compact('message'));
    }

    /**
     * Edit the status for the contact message.
     *
     * @param  string  $status    The status name for the message. (open or closed)
     * @param  integer $contactId The primary key in the storage for the contact message.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status($contactId, $status): RedirectResponse
    {
        return redirect()->back(302);
    }

    /**
     * Delete a contact message in thue storage.
     *
     * @param  integer $contactId The primary key in the storage for the contact message.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($contactId): RedirectResponse
    {
        return redirect()->back(302);
    }
}
