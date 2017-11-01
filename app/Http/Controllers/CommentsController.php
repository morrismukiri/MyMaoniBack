<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentsRequest;
use App\Http\Requests\UpdateCommentsRequest;
use App\Repositories\CommentsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CommentsController extends AppBaseController
{
    /** @var  CommentsRepository */
    private $commentsRepository;

    public function __construct(CommentsRepository $commentsRepo)
    {
        $this->commentsRepository = $commentsRepo;
    }

    /**
     * Display a listing of the Comments.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->commentsRepository->pushCriteria(new RequestCriteria($request));
        $comments = $this->commentsRepository->paginate(10);

        return view('comments.index')
            ->with('comments', $comments);
    }

    /**
     * Show the form for creating a new Comments.
     *
     * @return Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created Comments in storage.
     *
     * @param CreateCommentsRequest $request
     *
     * @return Response
     */
    public function store(CreateCommentsRequest $request)
    {
        $input = $request->all();

        $comments = $this->commentsRepository->create($input);

        Flash::success('Comments saved successfully.');

        return redirect(route('comments.index'));
    }

    /**
     * Display the specified Comments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comments = $this->commentsRepository->findWithoutFail($id);

        if (empty($comments)) {
            Flash::error('Comments not found');

            return redirect(route('comments.index'));
        }

        return view('comments.show')->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified Comments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comments = $this->commentsRepository->findWithoutFail($id);

        if (empty($comments)) {
            Flash::error('Comments not found');

            return redirect(route('comments.index'));
        }

        return view('comments.edit')->with('comments', $comments);
    }

    /**
     * Update the specified Comments in storage.
     *
     * @param  int              $id
     * @param UpdateCommentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCommentsRequest $request)
    {
        $comments = $this->commentsRepository->findWithoutFail($id);

        if (empty($comments)) {
            Flash::error('Comments not found');

            return redirect(route('comments.index'));
        }

        $comments = $this->commentsRepository->update($request->all(), $id);

        Flash::success('Comments updated successfully.');

        return redirect(route('comments.index'));
    }

    /**
     * Remove the specified Comments from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comments = $this->commentsRepository->findWithoutFail($id);

        if (empty($comments)) {
            Flash::error('Comments not found');

            return redirect(route('comments.index'));
        }

        $this->commentsRepository->delete($id);

        Flash::success('Comments deleted successfully.');

        return redirect(route('comments.index'));
    }
}
