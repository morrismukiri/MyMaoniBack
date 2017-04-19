<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOpinionAPIRequest;
use App\Http\Requests\API\UpdateOpinionAPIRequest;
use App\Models\Opinion;
use App\Repositories\OpinionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class OpinionController
 * @package App\Http\Controllers\API
 */

class OpinionAPIController extends AppBaseController
{
    /** @var  OpinionRepository */
    private $opinionRepository;

    public function __construct(OpinionRepository $opinionRepo)
    {
        $this->opinionRepository = $opinionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/opinions",
     *      summary="Get a listing of the Opinions.",
     *      tags={"Opinion"},
     *      description="Get all Opinions",
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
     *                  @SWG\Items(ref="#/definitions/Opinion")
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
        $this->opinionRepository->pushCriteria(new RequestCriteria($request));
        $this->opinionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $opinions = $this->opinionRepository->all();

        return $this->sendResponse($opinions->toArray(), 'Opinions retrieved successfully');
    }

    /**
     * @param CreateOpinionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/opinions",
     *      summary="Store a newly created Opinion in storage",
     *      tags={"Opinion"},
     *      description="Store Opinion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Opinion that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Opinion")
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
     *                  ref="#/definitions/Opinion"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateOpinionAPIRequest $request)
    {
        $input = $request->all();

        $opinions = $this->opinionRepository->create($input);
        $opinionsWithRelations =$this->opinionRepository->with(['user'])->findWithoutFail($opinions['id']);
        return $this->sendResponse($opinionsWithRelations->toArray(), 'Opinion saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/opinions/{id}",
     *      summary="Display the specified Opinion",
     *      tags={"Opinion"},
     *      description="Get Opinion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Opinion",
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
     *                  ref="#/definitions/Opinion"
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
        /** @var Opinion $opinion */
        $opinion = $this->opinionRepository->findWithoutFail($id);

        if (empty($opinion)) {
            return $this->sendError('Opinion not found');
        }

        return $this->sendResponse($opinion->toArray(), 'Opinion retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateOpinionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/opinions/{id}",
     *      summary="Update the specified Opinion in storage",
     *      tags={"Opinion"},
     *      description="Update Opinion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Opinion",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Opinion that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Opinion")
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
     *                  ref="#/definitions/Opinion"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateOpinionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Opinion $opinion */
        $opinion = $this->opinionRepository->findWithoutFail($id);

        if (empty($opinion)) {
            return $this->sendError('Opinion not found');
        }

        $opinion = $this->opinionRepository->update($input, $id);

        return $this->sendResponse($opinion->toArray(), 'Opinion updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/opinions/{id}",
     *      summary="Remove the specified Opinion from storage",
     *      tags={"Opinion"},
     *      description="Delete Opinion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Opinion",
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
        /** @var Opinion $opinion */
        $opinion = $this->opinionRepository->findWithoutFail($id);

        if (empty($opinion)) {
            return $this->sendError('Opinion not found');
        }

        $opinion->delete();

        return $this->sendResponse($id, 'Opinion deleted successfully');
    }
}
