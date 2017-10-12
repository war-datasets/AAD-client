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
        KoreanCasualtyRepository $koreanCasualtyRepository, VietnamCasualtyRepository $vietnamCasualtyRepository
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
            'selector'   => 'korea'
        ]);
    }

    /**
     * @param $serviceNo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
            'selector'   => 'vietnam',
        ]);
    }

    /**
     * Get a specific vietnam casualty by his service number.
     *
     * @param  string $serviceNo The service number for the casualty.
     * @return |Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showVietnam($serviceNo): View
    {
        return view('casualties.show', [
            'casualty' => $this->vietnamCasualtyRepository->findBy('service_no', $serviceNo)
        ]);
    }

    /**
     * Search for a specific record in the database.
     *
     * @param  Request $input The user given input data. (unvalidated)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $input): View
    {
        if ($input->dataset == 'vietnam') {
            return view('casualties.index', [
                'count'      => '',
                'casualties' => '',
                'selector'   => '',
            ]);
        }

        // Dataset is not vietnam. So display the results based on the korean dataset.
        return view('casualties.index', [
            'count'      => '',
            'casualties' => '',
            'selector'   => '',
        ]);
    }

    /**
     * [SHARED]: The edit form for the casualty.
     *
     * @param  string $serviceNo The military service number from the victim.
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function edit($serviceNo)
    {
        $casualty = $this->vietnamCasualtyRepository->findBy('service_no', $serviceNo);

        if (count($casualty) == 0) {
            $casualty = $this->koreanCasualtyRepository->findBy('service_no', $serviceNo);
        }

        return view('casualties.edit', compact('casualty'));
    }

}
