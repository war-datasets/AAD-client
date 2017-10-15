<?php

namespace App\Http\Controllers\Api;

use App\Http\Transformers\VietnamCasualtyTransformer;
use App\Repositories\VietnamCasualtyRepository;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;

/**
 * Class CasualtyController
 *
 * @author  Tim Joosten
 * @license MIT LICENSE
 * @package App\Http\Controllers\Api
 */
class VietnamCasualtyController extends ApiGuardController
{
    private $vietnamCasualtyRepository;

    /**
     * CasualtyController constructor.
     *
     * @param  VietnamCasualtyRepository $vietnamCasualtyRepository
     * @return void
     */
    public function __construct(VietnamCasualtyRepository $vietnamCasualtyRepository)
    {
        parent::__construct();
        $this->vietnamCasualtyRepository = $vietnamCasualtyRepository;
    }

    /**
     * The index method for the Vietnam casualty side
     *
     * @see    TODO: Document vietnam casualty index endpoint.
     * @return \Illuminate\Contracts\Routing\ResponseFactory
     */
    public function index()
    {
        if ($this->vietnamCasualtyRepository->entity()->count() === 0) {
            return $this->response->errorNotFound();
        }

        return $this->response->withPaginator(
            $this->vietnamCasualtyRepository->paginate(50), new VietnamCasualtyTransformer
        );
    }

    /**
     * Show a specific vietnam casualty.
     *
     * @see    TODO: Document vietnam casualty show end point.
     *
     * @param  string $serviceNo The service number from the casualty.
     * @return \Illuminate\Contracts\Routing\ResponseFactory
     */
    public function show($serviceNo)
    {
        $casualty = $this->vietnamCasualtyRepository->findBy('service_no', $serviceNo);

        if (count($casualty) > 0) {
            return $this->response->withItem($casualty, new VietnamCasualtyTransformer);
        }

        return $this->response->errorNotFound();
    }
}
