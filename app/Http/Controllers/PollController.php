<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePollRequest;
use App\Http\Requests\UpdatePollRequest;
use App\Repositories\PollRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PollController extends AppBaseController
{
    /** @var  PollRepository */
    private $pollRepository;

    public function __construct(PollRepository $pollRepo)
    {
        $this->pollRepository = $pollRepo;
    }

    /**
     * Display a listing of the Poll.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pollRepository->pushCriteria(new RequestCriteria($request));
        $polls = $this->pollRepository->all();

        return view('polls.index')
            ->with('polls', $polls);
    }

    /**
     * Show the form for creating a new Poll.
     *
     * @return Response
     */
    public function create()
    {
        return view('polls.create');
    }

    /**
     * Store a newly created Poll in storage.
     *
     * @param CreatePollRequest $request
     *
     * @return Response
     */
    public function store(CreatePollRequest $request)
    {
        $input = $request->all();
        $input['userId']= Auth::user()->id;

        $poll = $this->pollRepository->create($input);

        Flash::success('Poll saved successfully.');

        return redirect(route('polls.index'));
    }

    /**
     * Display the specified Poll.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $poll = $this->pollRepository->findWithoutFail($id);

        if (empty($poll)) {
            Flash::error('Poll not found');

            return redirect(route('polls.index'));
        }

        return view('polls.show')->with('poll', $poll);
    }

    /**
     * Show the form for editing the specified Poll.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $poll = $this->pollRepository->findWithoutFail($id);

        if (empty($poll)) {
            Flash::error('Poll not found');

            return redirect(route('polls.index'));
        }

        return view('polls.edit')->with('poll', $poll);
    }

    /**
     * Update the specified Poll in storage.
     *
     * @param  int              $id
     * @param UpdatePollRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePollRequest $request)
    {
        $poll = $this->pollRepository->findWithoutFail($id);

        if (empty($poll)) {
            Flash::error('Poll not found');

            return redirect(route('polls.index'));
        }

        $poll = $this->pollRepository->update($request->all(), $id);

        Flash::success('Poll updated successfully.');

        return redirect(route('polls.index'));
    }

    /**
     * Remove the specified Poll from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $poll = $this->pollRepository->findWithoutFail($id);

        if (empty($poll)) {
            Flash::error('Poll not found');

            return redirect(route('polls.index'));
        }

        $this->pollRepository->delete($id);

        Flash::success('Poll deleted successfully.');

        return redirect(route('polls.index'));
    }
}
