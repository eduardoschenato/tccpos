<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Quiz;
use App\Models\QuizQuestion;

class QuizController extends Controller
{
    
    public function index() {
        $items = Quiz::orderBy('name')->get();
        return view('assesments.quizzes', ['items' => $items]);
    }

    public function new() {
        return view("assesments.quiz", ["item" => new Quiz()]);
    }

    public function form($id) {
        $item = Quiz::find($id);

        if(!$item) {
            return redirect()->route('quizzesList');
        }

        return view("assesments.quiz", ["item" => $item]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('quizzesList');
        }

        $item = new Quiz();
            
        $item->name = $request->input('name');
        $item->type = $request->input('type');
            
        $item->save();

        return redirect()->route('quizzesForm', ['id' => $item->id]);
    }

    public function update($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required'
        ]);

        if (!$validator->fails()) {
            $item = Quiz::find($id);
            
            $item->name = $request->input('name');
            $item->type = $request->input('type');
            
            $item->save();
        }

        return redirect()->route('quizzesList');
    }

    public function destroy($id) {
        $item = Quiz::find($id);

        if(!$item) {
            return redirect()->route('quizzesList');
        }

        $item->delete();

        return redirect()->route('quizzesList');
    }

    public function newQuestion($id) {
        $item = new QuizQuestion();
        $item->quiz_id = $id;

        return view("assesments.quiz_question", ["item" => $item]);
    }

    public function formQuestion($id, $question_id) {
        $item = QuizQuestion::find($question_id);

        if(!$item) {
            return redirect()->route('quizzesForm', ['id' => $id]);
        }

        return view("assesments.quiz_question", ["item" => $item]);
    }

    public function storeQuestion($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'quiz_id' => 'required|exists:quizzes,id',
            'question' => 'required',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('quizzesList');
        }

        $item = new QuizQuestion();
            
        $item->quiz_id = $request->input('quiz_id');
        $item->question = $request->input('question');
        $item->type = $request->input('type');
        $item->options = $request->input('options') ?? '';
            
        $item->save();

        return redirect()->route('quizzesForm', ['id' => $id]);
    }

    public function updateQuestion($id, $question_id, Request $request) {
        $validator = Validator::make($request->all(), [
            'quiz_id' => 'required|exists:quizzes,id',
            'question' => 'required',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('quizzesForm', ['id' => $id]);
        }

        $item = QuizQuestion::find($id);
        
        $item->quiz_id = $request->input('quiz_id');
        $item->question = $request->input('question');
        $item->type = $request->input('type');
        $item->options = $request->input('options') ?? '';
        
        $item->save();

        return redirect()->route('quizzesForm', ['id' => $id]);
    }

    public function destroyQuestion($id, $question_id) {
        $item = QuizQuestion::find($question_id);

        if(!$item) {
            return redirect()->route('quizzesForm', ['id' => $id]);
        }

        $item->delete();

        return redirect()->route('quizzesForm', ['id' => $id]);
    }

}
