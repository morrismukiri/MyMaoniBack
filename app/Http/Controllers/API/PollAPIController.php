<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePollAPIRequest;
use App\Http\Requests\API\UpdatePollAPIRequest;
use App\Models\Poll;
use App\Repositories\PollRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PollController
 * @package App\Http\Controllers\API
 */

class PollAPIController extends AppBaseController
{
    /** @var  PollRepository */
    private $pollRepository;

    public function __construct(PollRepository $pollRepo)
    {
        $this->pollRepository = $pollRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/polls",
     *      summary="Get a listing of the Polls.",
     *      tags={"Poll"},
     *      description="Get all Polls",
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
     *                  @SWG\Items(ref="#/definitions/Poll")
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
        $this->pollRepository->pushCriteria(new RequestCriteria($request));
        $this->pollRepository->pushCriteria(new LimitOffsetCriteria($request));
        $polls = $this->pollRepository->with(['user','opinions','category','answers','votes'])->orderBy('created_at','desc')->all();

        return $this->sendResponse($polls->toArray(), 'Polls retrieved successfully');
    }

    /**
     * @param CreatePollAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/polls",
     *      summary="Store a newly created Poll in storage",
     *      tags={"Poll"},
     *      description="Store Poll",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Poll that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Poll")
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
     *                  ref="#/definitions/Poll"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePollAPIRequest $request)
    {
        $input = $request->all();

        $polls = $this->pollRepository->create($input);

        return $this->sendResponse($polls->toArray(), 'Poll saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/polls/{id}",
     *      summary="Display the specified Poll",
     *      tags={"Poll"},
     *      description="Get Poll",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Poll",
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
     *                  ref="#/definitions/Poll"
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
        /** @var Poll $poll */
        $poll = $this->pollRepository->with(['user','opinions.user','category','answers','votes'])->findWithoutFail($id);

        if (empty($poll)) {
            return $this->sendError('Poll not found');
        }

        return $this->sendResponse($poll->toArray(), 'Poll retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePollAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/polls/{id}",
     *      summary="Update the specified Poll in storage",
     *      tags={"Poll"},
     *      description="Update Poll",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Poll",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Poll that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Poll")
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
     *                  ref="#/definitions/Poll"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePollAPIRequest $request)
    {
        $input = $request->all();

        /** @var Poll $poll */
        $poll = $this->pollRepository->findWithoutFail($id);

        if (empty($poll)) {
            return $this->sendError('Poll not found');
        }

        $poll = $this->pollRepository->update($input, $id);

        return $this->sendResponse($poll->toArray(), 'Poll updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/polls/{id}",
     *      summary="Remove the specified Poll from storage",
     *      tags={"Poll"},
     *      description="Delete Poll",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Poll",
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
        /** @var Poll $poll */
        $poll = $this->pollRepository->findWithoutFail($id);

        if (empty($poll)) {
            return $this->sendError('Poll not found');
        }

        $poll->delete();

        return $this->sendResponse($id, 'Poll deleted successfully');
    }

    public function pollsByUser($userId){

        $polls = $this->pollRepository
        ->with(['user','opinions','category','answers','votes'])->orderBy('created_at','desc')->findWhere(['userId'=>$userId]);

        return $this->sendResponse($polls->toArray(), 'Polls retrieved successfully');
    }

    public function usercontribution($userId,UserRepository $userRepository){
        $userRepo = $userRepository;
        $contribution = $userRepo->with(['opinions','votes','opinions.poll', 'votes.poll','opinions.poll.user', 'votes.poll.user','opinions.poll.opinions', 'votes.poll.opinions','opinions.poll.votes', 'votes.poll.votes'])->findWithoutFail($userId);
        return $this->sendResponse($contribution->toArray(), 'Contribution retrieved successfully');
    }
}
