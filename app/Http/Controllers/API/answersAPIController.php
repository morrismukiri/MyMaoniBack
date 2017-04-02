<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAnswersAPIRequest;
use App\Http\Requests\API\UpdateAnswersAPIRequest;
use App\Models\Answers;
use App\Repositories\AnswersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AnswersController
 * @package App\Http\Controllers\API
 */

class AnswersAPIController extends AppBaseController
{
    /** @var  AnswersRepository */
    private $answersRepository;

    public function __construct(AnswersRepository $answersRepo)
    {
        $this->answersRepository = $answersRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/answers",
     *      summary="Get a listing of the Answers.",
     *      tags={"Answers"},
     *      description="Get all Answers",
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
     *                  @SWG\Items(ref="#/definitions/Answers")
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
     * @param CreateAnswersAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/answers",
     *      summary="Store a newly created Answers in storage",
     *      tags={"Answers"},
     *      description="Store Answers",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Answers that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Answers")
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
     *                  ref="#/definitions/Answers"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAnswersAPIRequest $request)
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
     *      summary="Display the specified Answers",
     *      tags={"Answers"},
     *      description="Get Answers",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Answers",
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
     *                  ref="#/definitions/Answers"
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
        /** @var Answers $answers */
        $answers = $this->answersRepository->findWithoutFail($id);

        if (empty($answers)) {
            return $this->sendError('Answers not found');
        }

        return $this->sendResponse($answers->toArray(), 'Answers retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAnswersAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/answers/{id}",
     *      summary="Update the specified Answers in storage",
     *      tags={"Answers"},
     *      description="Update Answers",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Answers",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Answers that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Answers")
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
     *                  ref="#/definitions/Answers"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAnswersAPIRequest $request)
    {
        $input = $request->all();

        /** @var Answers $answers */
        $answers = $this->answersRepository->findWithoutFail($id);

        if (empty($answers)) {
            return $this->sendError('Answers not found');
        }

        $answers = $this->answersRepository->update($input, $id);

        return $this->sendResponse($answers->toArray(), 'Answers updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/answers/{id}",
     *      summary="Remove the specified Answers from storage",
     *      tags={"Answers"},
     *      description="Delete Answers",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Answers",
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
        /** @var Answers $answers */
        $answers = $this->answersRepository->findWithoutFail($id);

        if (empty($answers)) {
            return $this->sendError('Answers not found');
        }

        $answers->delete();

        return $this->sendResponse($id, 'Answers deleted successfully');
    }
}
