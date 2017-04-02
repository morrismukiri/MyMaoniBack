<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateanswersRequest;
use App\Http\Requests\UpdateanswersRequest;
use App\Repositories\answersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class answersController extends AppBaseController
{
    /** @var  answersRepository */
    private $answersRepository;

    public function __construct(answersRepository $answersRepo)
    {
        $this->answersRepository = $answersRepo;
    }

    /**
     * Display a listing of the answers.
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
     * Show the form for creating a new answers.
     *
     * @return Response
     */
    public function create()
    {
        return view('answers.create');
    }

    /**
     * Store a newly created answers in storage.
     *
     * @param CreateanswersRequest $request
     *
     * @return Response
     */
    public function store(CreateanswersRequest $request)
    {
        $input = $request->all();

        $answers = $this->answersRepository->create($input);

        Flash::success('Answers saved successfully.');

        return redirect(route('answers.index'));
    }

    /**
     * Display the specified answers.
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
     * Show the form for editing the specified answers.
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
     * Update the specified answers in storage.
     *
     * @param  int              $id
     * @param UpdateanswersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateanswersRequest $request)
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
     * Remove the specified answers from storage.
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
