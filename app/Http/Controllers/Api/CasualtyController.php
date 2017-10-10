<?php

namespace App\Http\Controllers\Api;

use App\Repositories\KoreanCasualtyRepository;
use App\Repositories\VietnamCasualtyRepository;
use App\VietnamCasualties;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;

/**
 * Class CasualtyController
 *
 * @author  Tim Joosten
 * @license MIT LICENSE
 * @package App\Http\Controllers\Api
 */
class CasualtyController extends ApiGuardController
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
        $this->vietnamcasualtyRepository = $vietnamCasualtyRepository;
    }

    /**
     * The index method for the Vietnam casualty side
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory
     */
    public function index()
    {
        $baseModel = $this->vietnamCasualtyRepository;

        if ($baseModel->count() === 0) {
            return $this->response->withArray([
                'http_code' => $this->response->getStatusCode(),
                'messages'  => trans('api-controller.no-vietnam-casualties')
            ]);
        }

        return $this->response->withPaginator(
            $baseModel->paginate(50), new VietnamCasualtiesTransformer
        );
    }
}
