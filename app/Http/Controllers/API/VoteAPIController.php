<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Models\Vote;
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
}