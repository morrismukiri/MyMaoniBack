<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateanswersAPIRequest;
use App\Http\Requests\API\UpdateanswersAPIRequest;
use App\Models\answers;
use App\Repositories\answersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class answersController
 * @package App\Http\Controllers\API
 */

class answersAPIController extends AppBaseController
{
    /** @var  answersRepository */
    private $answersRepository;

    public function __construct(answersRepository $answersRepo)
    {
        $this->answersRepository = $answersRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/answers",
     *      summary="Get a listing of the answers.",
     *      tags={"answers"},
     *      description="Get all answers",
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
     *                  @SWG\Items(ref="#/definitions/answers")
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
        $this->answersRepository->pushCriteria(new RequestCriteria($request));
        $this->answersRepository->pushCriteria(new LimitOffsetCriteria($request));
        $answers = $this->answersRepository->all();

        return $this->sendResponse($answers->toArray(), 'Answers retrieved successfully');
    }

    /**
     * @param CreateanswersAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/answers",
     *      summary="Store a newly created answers in storage",
     *      tags={"answers"},
     *      description="Store answers",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="answers that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/answers")
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
     *                  ref="#/definitions/answers"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateanswersAPIRequest $request)
    {
        $input = $request->all();

        $answers = $this->answersRepository->create($input);

        return $this->sendResponse($answers->toArray(), 'Answers saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/answers/{id}",
     *      summary="Display the specified answers",
     *      tags={"answers"},
     *      description="Get answers",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of answers",
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
     *                  ref="#/definitions/answers"
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
        /** @var answers $answers */
        $answers = $this->answersRepository->findWithoutFail($id);

        if (empty($answers)) {
            return $this->sendError('Answers not found');
        }

        return $this->sendResponse($answers->toArray(), 'Answers retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateanswersAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/answers/{id}",
     *      summary="Update the specified answers in storage",
     *      tags={"answers"},
     *      description="Update answers",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of answers",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="answers that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/answers")
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
     *                  ref="#/definitions/answers"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateanswersAPIRequest $request)
    {
        $input = $request->all();

        /** @var answers $answers */
        $answers = $this->answersRepository->findWithoutFail($id);

        if (empty($answers)) {
            return $this->sendError('Answers not found');
        }

        $answers = $this->answersRepository->update($input, $id);

        return $this->sendResponse($answers->toArray(), 'answers updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/answers/{id}",
     *      summary="Remove the specified answers from storage",
     *      tags={"answers"},
     *      description="Delete answers",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of answers",
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
        /** @var answers $answers */
        $answers = $this->answersRepository->findWithoutFail($id);

        if (empty($answers)) {
            return $this->sendError('Answers not found');
        }

        $answers->delete();

        return $this->sendResponse($id, 'Answers deleted successfully');
    }
}
