<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactValidator;
use App\Repositories\ContactRepository;
use Illuminate\Http\{Request, RedirectResponse};
use Illuminate\View\View;

/**
 * Class ContactController
 *
 * @package App\Http\Controllers
 */
class ContactController extends Controller
{
    private $contactRepository; /** @var ContactRepository $contactRepository */

    /**
     * ContactController Constructor
	 *
	 * @param  ContactRepository $contactRepository The abstraction layer for the contact db model.
	 * @return void
     */
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

	/**
	 * The index page for the contact form.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function create(): View
    {
    	return view('contact.index');
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
    }

    /**
     * @todo docblock
     */
    public function show()
    {
        // IF contact message exists. 
        //    THEN Display contact message. 
        //    ELSE Abort application and throw a 404 page. 
    }

    /**
     * @todo docblock
     */
    public function status()
    {
        return "<code>TODO</code>";
    }

    /**
     * @todo docblock
     */
    public function delete(): RedirectResponse
    {
        return "<code>TODO</code>";
    }
}
