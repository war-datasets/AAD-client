<?php

namespace App\Http\Controllers;

use App\Repositories\KoreanCasualtyRepository;
use App\Repositories\VietnamCasualtyRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class CasualtyController
 *
 * @package App\Http\Controllers
 */
class CasualtyController extends Controller
{
    private $koreanCasualtyRepository;  /** @var KoreanCasualtyRepository  */
    private $vietnamCasualtyRepository; /** @var VietnamCasualtyRepository */

    /**
     * CasualtyController constructor.
     *
     * @param  KoreanCasualtyRepository  $koreanCasualtyRepository
     * @param  VietnamCasualtyRepository $vietnamCasualtyRepository
     * @return void
     */
    public function __construct(
        KoreanCasualtyRepository $koreanCasualtyRepository,
        VietnamCasualtyRepository $vietnamCasualtyRepository
    ) {
        $this->vietnamCasualtyRepository = $vietnamCasualtyRepository;
        $this->koreanCasualtyRepository  = $koreanCasualtyRepository;
    }

    /**
     * Get the index page for the korean casualties.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexKorea(): View
    {
        return view('casualties.index', [
            'count'      => $this->koreanCasualtyRepository->entity()->count(),
            'casualties' => $this->koreanCasualtyRepository->paginate(50),
        ]);
    }

    public function showKorea($serviceNo): View
    {
        return view('casualties.show', [
            'casualty' => $this->koreanCasualtyRepository->findBy('service_no', $serviceNo)
        ]);
    }

    /**
     * Get the index page for the vietnam casualties.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexVietnam(): View
    {
        return view('casualties.index', [
            'count'      => $this->vietnamCasualtyRepository->entity()->count(),
            'casualties' => $this->vietnamCasualtyRepository->paginate(50),
        ]);
    }

    public function search(Request $input): View
    {

    }
}
