<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class DisclaimerController
 *
 * @package App\Http\Controllers
 */
class DisclaimerController extends Controller
{
    /**
     * Display the index controller for the disclaimer.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(): View
    {
        return view('disclaimer');
    }
}
