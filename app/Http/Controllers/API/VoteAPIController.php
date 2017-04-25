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
        $data = $request->only('userId', 'pollId', 'answerId');
        $validator = Validator::make($request->all(), Vote::$rules);
        if ($validator->fails()) {
            $errors = $validator->messages();
            return response()->json(compact('errors'), 400);
        } else {

            try {
                $vote = Vote::create($data);
            } catch (Exception $e) {
                return response::json(['error' => 'Error adding vote'], response::HTTP_CONFLICT);
            }

            return response()->json(compact('vote'));

        }
    }
    public function voteResult($id,VoteRepository $voteRepo){
        $voteResult = $voteRepo->with(['poll','poll.user','poll.votes', 'poll.votes.voter','poll.votes.answer'])->findWhere(['pollId'=>$id]);
        return response()->json(compact('voteResult'));
    }
}