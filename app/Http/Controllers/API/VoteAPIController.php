<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Models\Vote;
use App\Repositories\SurveyRepository;
use App\Repositories\VoteRepository;
use App\User;
use Illuminate\Http\Request;
use JWTAuth;
use League\Flysystem\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Repositories\UserRepository;
use Validator;

class VoteAPIController extends AppBaseController
{

    public function vote(Request $request)
    {
        $votes = $request->json()->all();//only('userId', 'pollId', 'answerId', 'comment');

        foreach ($votes as $vote) {
            $validator = Validator::make($vote, Vote::$rules);
            if ($validator->fails()) {
                $errors = $validator->messages();
                return response()->json(compact('errors'), 400);
            } else {

                try {
                    $insertedVotes[] = Vote::create($vote);
                } catch (Exception $e) {
                    return response::json(['error' => 'Error adding vote'], response::HTTP_CONFLICT);
                }
            }
        }

        return response()->json(compact('$insertedVotes'));


    }

    public function voteResult($id, VoteRepository $voteRepo)
    {
        $voteResult = $voteRepo->with(['poll', 'poll.user', 'poll.votes', 'poll.votes.voter', 'poll.votes.answer'])->findWhere(['pollId' => $id]);
        return response()->json(compact('voteResult'));
    }

    public function user_contributed_surveys($userId, VoteRepository $voteRepository, UserRepository $userRepository, SurveyRepository $surveyRepository)
    {

        $surveyRepo = $surveyRepository;
        $userRepo = $userRepository;
        $voteRepo = $voteRepository;

        $contribution = $surveyRepo->with(['votes'])->whereHas('polls.votes', function ($query) use ($userId) {
            $query->where('userId', $userId);
        })->all();
//            ->findWhere(['userId' => $userId]);
        //get all surveys contributed by $userId

//        $contribution = $voteRepo->with(['poll.survey'])
//            ->findWhere(['userId' => $userId]);

//        $contribution = $userRepo->with(['opinions','votes','surveys','opinions.poll', 'votes.poll','opinions.poll.user', 'votes.poll.user','opinions.poll.opinions', 'votes.poll.opinions','opinions.poll.votes', 'votes.poll.votes'])->findWithoutFail($userId);
        return $this->sendResponse($contribution->toArray(), 'Contribution retrieved successfully');
    }
}