<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateQuizAPIRequest;
use App\Http\Requests\API\UpdateQuizAPIRequest;
use App\Models\Quiz;
use App\Repositories\QuizRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\QuizResource;
use Response;

/**
 * Class QuizController
 * @package App\Http\Controllers\API
 */

class QuizAPIController extends AppBaseController
{
    /** @var  QuizRepository */
    private $quizRepository;

    public function __construct(QuizRepository $quizRepo)
    {
        $this->quizRepository = $quizRepo;
    }

    public function create() {

        $quizzes = $this->quizRepository->all();

        return view('app.jogarquiz', ['quizzes' => $quizzes->toArray()]);
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/quizzes",
     *      summary="Get a listing of the Quizzes.",
     *      tags={"Quiz"},
     *      description="Get all Quizzes",
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
     *                  @SWG\Items(ref="#/definitions/Quiz")
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
        $quizzes = $this->quizRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(QuizResource::collection($quizzes), 'Quizzes retrieved successfully');
    }

    /**
     * @param CreateQuizAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/quizzes",
     *      summary="Store a newly created Quiz in storage",
     *      tags={"Quiz"},
     *      description="Store Quiz",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Quiz that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Quiz")
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
     *                  ref="#/definitions/Quiz"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateQuizAPIRequest $request)
    {
        $input = $request->all();

        $quiz = $this->quizRepository->create($input);

        return $this->sendResponse(new QuizResource($quiz), 'Quiz saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/quizzes/{id}",
     *      summary="Display the specified Quiz",
     *      tags={"Quiz"},
     *      description="Get Quiz",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Quiz",
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
     *                  ref="#/definitions/Quiz"
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
        /** @var Quiz $quiz */
        $quiz = $this->quizRepository->find($id);

        if (empty($quiz)) {
            return $this->sendError('Quiz not found');
        }

        return $this->sendResponse(new QuizResource($quiz), 'Quiz retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateQuizAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/quizzes/{id}",
     *      summary="Update the specified Quiz in storage",
     *      tags={"Quiz"},
     *      description="Update Quiz",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Quiz",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Quiz that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Quiz")
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
     *                  ref="#/definitions/Quiz"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateQuizAPIRequest $request)
    {
        $input = $request->all();

        /** @var Quiz $quiz */
        $quiz = $this->quizRepository->find($id);

        if (empty($quiz)) {
            return $this->sendError('Quiz not found');
        }

        $quiz = $this->quizRepository->update($input, $id);

        return $this->sendResponse(new QuizResource($quiz), 'Quiz updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/quizzes/{id}",
     *      summary="Remove the specified Quiz from storage",
     *      tags={"Quiz"},
     *      description="Delete Quiz",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Quiz",
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
        /** @var Quiz $quiz */
        $quiz = $this->quizRepository->find($id);

        if (empty($quiz)) {
            return $this->sendError('Quiz not found');
        }

        $quiz->delete();

        return $this->sendSuccess('Quiz deleted successfully');
    }
}
