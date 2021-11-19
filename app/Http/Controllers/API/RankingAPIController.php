<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRankingAPIRequest;
use App\Http\Requests\API\UpdateRankingAPIRequest;
use App\Models\Ranking;
use App\Repositories\RankingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\RankingResource;
use Response;

/**
 * Class RankingController
 * @package App\Http\Controllers\API
 */

class RankingAPIController extends AppBaseController
{
    /** @var  RankingRepository */
    private $rankingRepository;

    public function __construct(RankingRepository $rankingRepo)
    {
        $this->rankingRepository = $rankingRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/rankings",
     *      summary="Get a listing of the Rankings.",
     *      tags={"Ranking"},
     *      description="Get all Rankings",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Ranking")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $rankings = $this->rankingRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(RankingResource::collection($rankings), 'Rankings retrieved successfully');
    }

    /**
     * @param CreateRankingAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/rankings",
     *      summary="Store a newly created Ranking in storage",
     *      tags={"Ranking"},
     *      description="Store Ranking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Ranking that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Ranking")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Ranking"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateRankingAPIRequest $request)
    {
        $input = $request->all();

        $ranking = $this->rankingRepository->create($input);

        return $this->sendResponse(new RankingResource($ranking), 'Ranking saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/rankings/{id}",
     *      summary="Display the specified Ranking",
     *      tags={"Ranking"},
     *      description="Get Ranking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Ranking",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Ranking"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Ranking $ranking */
        $ranking = $this->rankingRepository->find($id);

        if (empty($ranking)) {
            return $this->sendError('Ranking not found');
        }

        return $this->sendResponse(new RankingResource($ranking), 'Ranking retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateRankingAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/rankings/{id}",
     *      summary="Update the specified Ranking in storage",
     *      tags={"Ranking"},
     *      description="Update Ranking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Ranking",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Ranking that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Ranking")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Ranking"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateRankingAPIRequest $request)
    {
        $input = $request->all();

        /** @var Ranking $ranking */
        $ranking = $this->rankingRepository->find($id);

        if (empty($ranking)) {
            return $this->sendError('Ranking not found');
        }

        $ranking = $this->rankingRepository->update($input, $id);

        return $this->sendResponse(new RankingResource($ranking), 'Ranking updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/rankings/{id}",
     *      summary="Remove the specified Ranking from storage",
     *      tags={"Ranking"},
     *      description="Delete Ranking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Ranking",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Ranking $ranking */
        $ranking = $this->rankingRepository->find($id);

        if (empty($ranking)) {
            return $this->sendError('Ranking not found');
        }

        $ranking->delete();

        return $this->sendSuccess('Ranking deleted successfully');
    }
}
