<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Student;
use App\Models\Announcement;
use App\Models\User;
use App\Models\Student_Lesson;
use App\Models\Student_Quiz;
use App\Models\Student_Game;
use App\Models\Leaderboard;






class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $student = Student::where('user_id', Auth::user()->id)->first();
        $announcement = Announcement::orderBy('id', 'DESC')->get();
        $name = Auth::user()->name;
        // dd($name);
        $splitName = explode(' ', $name); // Restricts it to only 2 values, for names like Billy Bob Jones

        $first_name = $splitName[0];
        $last_name = !empty($splitName[1]) ? $splitName[1] : ''; // If last name doesn't exist, make it empty




        //check student id
        $student_checker = Student::where('user_id', Auth::user()->id)->count();

        if ($student_checker == 0) {
            //create student id
            $student = new Student();

            $student->user_id = Auth::user()->id;
            $student->save();

            //fetch student id
            $student_id = Auth::user()->student->id;

            //checking table leaderboard sama ada dah daftar ke blum
            $find_leaderboard = Leaderboard::where('student_id', $student_id)->count();


            //kalau 0 tak daftar, klau 1 dah daftar
            if ($find_leaderboard == 0) {

                //create leader board
                $leaderboard = new Leaderboard();

                //initialize data
                $leaderboard->student_id = $student_id;
                $leaderboard->scores = 0;
                $leaderboard->save();
            }
        }

        // create student id
        if ($student) {
            //track student progress
            $student_id = Auth::user()->student->id;
            $lesson_progress = Student_Lesson::where('student_id', $student_id)->count();
            $lesson_progress = ($lesson_progress / 10) * 100;

            $quiz_progress = Student_Quiz::where('result_status', "Lulus")->where('student_id', $student_id)->distinct('quiz_id')->count();
            $quiz_progress = ($quiz_progress / 10) * 100;

            $game_progress = Student_Game::where('student_id', $student_id)->distinct('game_id')->count();
            $game_progress = ($game_progress / 10) * 100;

            auth()->user()->lesson_progress = $lesson_progress;
            auth()->user()->quiz_progress = $quiz_progress;
            auth()->user()->game_progress = $game_progress;
            auth()->user()->save();
        } else {
            $student_id = Student::create([
                'user_id' => Auth::user()->id,
            ]);

            //track student progress
            $lesson_progress = Student_Lesson::where('student_id', $student_id)->count();
            $lesson_progress = ($lesson_progress / 10) * 100;


            $quiz_progress = Student_Quiz::where('result_status', "Lulus")->where('student_id', $student_id)->distinct('quiz_id')->count();
            $quiz_progress = ($quiz_progress / 10) * 100;

            $game_progress = Student_Game::where('student_id', $student_id)->distinct('game_id')->count();
            $game_progress = ($game_progress / 10) * 100;

            auth()->user()->lesson_progress = $lesson_progress;
            auth()->user()->quiz_progress = $quiz_progress;
            auth()->user()->game_progress = $game_progress;
            auth()->user()->save();
        }

        return view('home', compact('announcement', 'lesson_progress', 'quiz_progress', 'game_progress', 'splitName'));
    }
}
