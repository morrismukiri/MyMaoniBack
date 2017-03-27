<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOpinionRequest;
use App\Http\Requests\UpdateOpinionRequest;
use App\Models\Poll;
use App\Repositories\OpinionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Input;
class OpinionController extends AppBaseController
{
    /** @var  OpinionRepository */
    private $opinionRepository;

    public function __construct(OpinionRepository $opinionRepo)
    {
        $this->opinionRepository = $opinionRepo;
    }

    /**
     * Display a listing of the Opinion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->opinionRepository->pushCriteria(new RequestCriteria($request));
        $opinions = $this->opinionRepository->all();

        return view('opinions.index')
            ->with('opinions', $opinions);
    }

    /**
     * Show the form for creating a new Opinion.
     *
     * @return Response
     */
    public function create()
    {
        $polls = Poll::pluck('title', 'id')->all();
        return view('opinions.create')->with(compact('polls'));
    }

    /**
     * Store a newly created Opinion in storage.
     *
     * @param CreateOpinionRequest $request
     *
     * @return Response
     */
    public function store(CreateOpinionRequest $request)
    {
        $input = $request->all();
        $input['userId'] = Auth::user()->id;

        $opinion = $this->opinionRepository->create($input);

        Flash::success('Opinion saved successfully.');

        return redirect(route('opinions.index'));
    }

    /**
     * Display the specified Opinion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $opinion = $this->opinionRepository->findWithoutFail($id);

        if (empty($opinion)) {
            Flash::error('Opinion not found');

            return redirect(route('opinions.index'));
        }

        return view('opinions.show')->with('opinion', $opinion);
    }

    /**
     * Show the form for editing the specified Opinion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $opinion = $this->opinionRepository->findWithoutFail($id);

        if (empty($opinion)) {
            Flash::error('Opinion not found');

            return redirect(route('opinions.index'));
        }
        $polls = Poll::pluck('title', 'id')->all();
        return view('opinions.edit')->with('opinion', $opinion)->with(compact('polls'));
    }

    /**
     * Update the specified Opinion in storage.
     *
     * @param  int $id
     * @param UpdateOpinionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOpinionRequest $request)
    {
        $opinion = $this->opinionRepository->findWithoutFail($id);

        if (empty($opinion)) {
            Flash::error('Opinion not found');

            return redirect(route('opinions.index'));
        }

        $opinion = $this->opinionRepository->update($request->all(), $id);

        Flash::success('Opinion updated successfully.');

        return redirect(route('opinions.index'));
    }

    /**
     * Remove the specified Opinion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $opinion = $this->opinionRepository->findWithoutFail($id);

        if (empty($opinion)) {
            Flash::error('Opinion not found');

            return redirect(route('opinions.index'));
        }

        $this->opinionRepository->delete($id);

        Flash::success('Opinion deleted successfully.');

        return redirect(route('opinions.index'));
    }
}
