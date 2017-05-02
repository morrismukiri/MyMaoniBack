<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSurveyAPIRequest;
use App\Http\Requests\API\UpdateSurveyAPIRequest;
use App\Models\Survey;
use App\Repositories\SurveyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SurveyController
 * @package App\Http\Controllers\API
 */

class SurveyAPIController extends AppBaseController
{
    /** @var  SurveyRepository */
    private $surveyRepository;

    public function __construct(SurveyRepository $surveyRepo)
    {
        $this->surveyRepository = $surveyRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/surveys",
     *      summary="Get a listing of the Surveys.",
     *      tags={"Survey"},
     *      description="Get all Surveys",
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
     *                  @SWG\Items(ref="#/definitions/Survey")
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
        $this->surveyRepository->pushCriteria(new RequestCriteria($request));
        $this->surveyRepository->pushCriteria(new LimitOffsetCriteria($request));
        $surveys = $this->surveyRepository->all();

        return $this->sendResponse($surveys->toArray(), 'Surveys retrieved successfully');
    }

    /**
     * @param CreateSurveyAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/surveys",
     *      summary="Store a newly created Survey in storage",
     *      tags={"Survey"},
     *      description="Store Survey",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Survey that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Survey")
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
     *                  ref="#/definitions/Survey"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSurveyAPIRequest $request)
    {
        $input = $request->all();

        $surveys = $this->surveyRepository->create($input);

        return $this->sendResponse($surveys->toArray(), 'Survey saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/surveys/{id}",
     *      summary="Display the specified Survey",
     *      tags={"Survey"},
     *      description="Get Survey",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Survey",
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
     *                  ref="#/definitions/Survey"
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
        /** @var Survey $survey */
        $survey = $this->surveyRepository->findWithoutFail($id);

        if (empty($survey)) {
            return $this->sendError('Survey not found');
        }

        return $this->sendResponse($survey->toArray(), 'Survey retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSurveyAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/surveys/{id}",
     *      summary="Update the specified Survey in storage",
     *      tags={"Survey"},
     *      description="Update Survey",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Survey",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Survey that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Survey")
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
     *                  ref="#/definitions/Survey"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSurveyAPIRequest $request)
    {
        $input = $request->all();

        /** @var Survey $survey */
        $survey = $this->surveyRepository->findWithoutFail($id);

        if (empty($survey)) {
            return $this->sendError('Survey not found');
        }

        $survey = $this->surveyRepository->update($input, $id);

        return $this->sendResponse($survey->toArray(), 'Survey updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/surveys/{id}",
     *      summary="Remove the specified Survey from storage",
     *      tags={"Survey"},
     *      description="Delete Survey",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Survey",
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
        /** @var Survey $survey */
        $survey = $this->surveyRepository->findWithoutFail($id);

        if (empty($survey)) {
            return $this->sendError('Survey not found');
        }

        $survey->delete();

        return $this->sendResponse($id, 'Survey deleted successfully');
    }
}
