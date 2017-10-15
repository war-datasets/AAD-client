<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class DocumentationController
 *
 * @package App\Http\Controllers
 */
class DocumentationController extends Controller
{
    /**
     * DocumentationController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the documentation page for the api.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view("documentation.api");
    }
}
