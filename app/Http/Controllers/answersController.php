<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnswersRequest;
use App\Http\Requests\UpdateAnswersRequest;
use App\Repositories\AnswersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnswersController extends AppBaseController
{
    /** @var  AnswersRepository */
    private $answersRepository;

    public function __construct(AnswersRepository $answersRepo)
    {
        $this->answersRepository = $answersRepo;
    }

    /**
     * Display a listing of the Answers.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->answersRepository->pushCriteria(new RequestCriteria($request));
        $answers = $this->answersRepository->all();

        return view('answers.index')
            ->with('answers', $answers);
    }

    /**
     * Show the form for creating a new Answers.
     *
     * @return Response
     */
    public function create()
    {
        return view('answers.create');
    }

    /**
     * Store a newly created Answers in storage.
     *
     * @param CreateAnswersRequest $request
     *
     * @return Response
     */
    public function store(CreateAnswersRequest $request)
    {
        $input = $request->all();

        $answers = $this->answersRepository->create($input);

        Flash::success('Answers saved successfully.');

        return redirect(route('answers.index'));
    }

    /**
     * Display the specified Answers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $answers = $this->answersRepository->findWithoutFail($id);

        if (empty($answers)) {
            Flash::error('Answers not found');

            return redirect(route('answers.index'));
        }

        return view('answers.show')->with('answers', $answers);
    }

    /**
     * Show the form for editing the specified Answers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $answers = $this->answersRepository->findWithoutFail($id);

        if (empty($answers)) {
            Flash::error('Answers not found');

            return redirect(route('answers.index'));
        }

        return view('answers.edit')->with('answers', $answers);
    }

    /**
     * Update the specified Answers in storage.
     *
     * @param  int              $id
     * @param UpdateAnswersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnswersRequest $request)
    {
        $answers = $this->answersRepository->findWithoutFail($id);

        if (empty($answers)) {
            Flash::error('Answers not found');

            return redirect(route('answers.index'));
        }

        $answers = $this->answersRepository->update($request->all(), $id);

        Flash::success('Answers updated successfully.');

        return redirect(route('answers.index'));
    }

    /**
     * Remove the specified Answers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $answers = $this->answersRepository->findWithoutFail($id);

        if (empty($answers)) {
            Flash::error('Answers not found');

            return redirect(route('answers.index'));
        }

        $this->answersRepository->delete($id);

        Flash::success('Answers deleted successfully.');

        return redirect(route('answers.index'));
    }
}
