<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

/**
 * Class ContactController
 *
 * @package App\Http\Controllers
 */
class ContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function create()
    {

    }
}
