<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCommentsAPIRequest;
use App\Http\Requests\API\UpdateCommentsAPIRequest;
use App\Models\Comments;
use App\Repositories\CommentsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CommentsController
 * @package App\Http\Controllers\API
 */

class CommentsAPIController extends AppBaseController
{
    /** @var  CommentsRepository */
    private $commentsRepository;

    public function __construct(CommentsRepository $commentsRepo)
    {
        $this->commentsRepository = $commentsRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/comments",
     *      summary="Get a listing of the Comments.",
     *      tags={"Comments"},
     *      description="Get all Comments",
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
     *                  @SWG\Items(ref="#/definitions/Comments")
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
        $this->commentsRepository->pushCriteria(new RequestCriteria($request));
        $this->commentsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $comments = $this->commentsRepository->all();

        return $this->sendResponse($comments->toArray(), 'Comments retrieved successfully');
    }

    /**
     * @param CreateCommentsAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/comments",
     *      summary="Store a newly created Comments in storage",
     *      tags={"Comments"},
     *      description="Store Comments",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Comments that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Comments")
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
     *                  ref="#/definitions/Comments"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCommentsAPIRequest $request)
    {
        $input = $request->all();

        $comments = $this->commentsRepository->create($input);

        return $this->sendResponse($comments->toArray(), 'Comments saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/comments/{id}",
     *      summary="Display the specified Comments",
     *      tags={"Comments"},
     *      description="Get Comments",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Comments",
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
     *                  ref="#/definitions/Comments"
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
        /** @var Comments $comments */
        $comments = $this->commentsRepository->findWithoutFail($id);

        if (empty($comments)) {
            return $this->sendError('Comments not found');
        }

        return $this->sendResponse($comments->toArray(), 'Comments retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCommentsAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/comments/{id}",
     *      summary="Update the specified Comments in storage",
     *      tags={"Comments"},
     *      description="Update Comments",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Comments",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Comments that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Comments")
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
     *                  ref="#/definitions/Comments"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCommentsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Comments $comments */
        $comments = $this->commentsRepository->findWithoutFail($id);

        if (empty($comments)) {
            return $this->sendError('Comments not found');
        }

        $comments = $this->commentsRepository->update($input, $id);

        return $this->sendResponse($comments->toArray(), 'Comments updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/comments/{id}",
     *      summary="Remove the specified Comments from storage",
     *      tags={"Comments"},
     *      description="Delete Comments",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Comments",
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
        /** @var Comments $comments */
        $comments = $this->commentsRepository->findWithoutFail($id);

        if (empty($comments)) {
            return $this->sendError('Comments not found');
        }

        $comments->delete();

        return $this->sendResponse($id, 'Comments deleted successfully');
    }
}
