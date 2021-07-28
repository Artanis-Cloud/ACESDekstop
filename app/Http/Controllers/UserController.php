<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Districts;
use App\Models\School;
use App\Models\Feedback;


use Illuminate\Support\Facades\Validator;
use Storage;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{

    public function disclaimer()
    {
        return view('disclaimer');
    }
    public function tnc()
    {
        return view('tnc');
    }
    public function privacy()
    {
        return view('privacy');
    }
    public function editProfile()
    {
        $user_id = Auth::user()->id;
        $user = User::findorFail($user_id);
        $district = Districts::get();
        $school = School::get();

        return view('user.profile.edit', compact('user', 'district', 'school'));
    }


    public function update($id)
    {
        $user = User::findorFail($id);
        $user->name = request()->name;
        $user->email = request()->email;
        $user->alamat = request()->alamat;
        $user->poskod = request()->poskod;
        $user->negeri = request()->negeri;
        $user->ic_number = request()->ic_number;
        $user->save();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],
            'addre' => ['nullable', 'string'],
            'poskod' => ['nullable', 'string'],
            'negeri' => ['nullable', 'string'],
            'ic_number' => ['nullable', 'string'],
        ]);
    }

    public function updateprofil(Request $request)
    {
        // dd($request->all());


        // $this->validatorProfile(request()->all())->validate();



        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        $user->name = request()->name;
        $user->ic_number = request()->ic_number;
        $user->email = request()->email;
        $user->phone = request()->phone;
        $user->address = request()->address;
        $user->postcode = request()->postcode;
        $user->state = request()->state;
        $user->district = request()->district;
        $user->school = request()->school;


        //upload profile picture
        // $upload = $request->file('gambar')->store('public/uploads');
        // $path = Storage::url($upload);
        // $gambar_profile = $path;

        if ($files = request()->file('gambar_profile') != null) {
            $gambar_profile = request()->file('gambar_profile')->store('public/uploads/user_pictures');
            $path = Storage::url($gambar_profile);
            $user->profile_picture = $path;
        }

        $user->save();

        return redirect()->route('user.profile.edit')->with("success", "User profile has been updated");
    }

    protected function validatorProfile(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string'],
            'ic_number' => ['required', 'string'],
            'email' => ['required', 'email'],
            // 'phone' =>['required', 'string'],
            'alamat' => ['required', 'string'],
            'poskod' => ['required'],
            'negeri' => ['required', 'string'],
        ]);
    }


    public function feedback()
    {
        return view('others.feedback');
    }

    public function feedbackSave(Request $request)
    {
        // dd($request->all());
        event($feedback_id = $this->createFeedback($request->all()));

        return redirect()->route('others.feedback')->with("success", "Your feed back has been submitted");
    }

    public function createFeedback(array $data)
    {
        $user_id = Auth::user()->id;
        $status = "1";
        return Feedback::create([
            'subject' => $data['subject'],
            'feedback' => $data['feedback'],
            'status' => $status,
            'user_id' => $user_id,
        ]);
    }

    public function viewChangePassword()
    {
        return view('user.change-password');
    }

    public function saveChangePassword(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        if (!(Hash::check($request->get('password'), Auth::user()->password))) {
            return redirect()->back()->with("error", "Current Password is Wrong");
        }

        if (strcmp($request->get('password'), $request->get('new_password')) == 0) {
            return redirect()->back()->with("error", "New Password cannot be same as Current Password");
        }

        if (strcmp($request->get('new_password'), $request->get('password_confirmation')) == 1) {
            return redirect()->back()->with("error", "New Password not same as Confirm Password");
        }

        $validatedData = $request->validate([
            'password' => 'required',
            'new_password' => 'required|string|min:6',
        ]);

        $hashed_random_password = Hash::make($request->get('new_password'));

        $user->password = $hashed_random_password;

        $user->save();

        return redirect()->route('user.change-password')->with("success", "Password has been changed");
    }

    public function progress()
    {
        $lesson_progress = DB::table('users')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.ic_number',
                'users.state',
                'users.district',
                'users.school',
                'users.lesson_progress',
                'students_lessons.lesson_id',
            )
            ->distinct('students_lessons.lesson_id')
            ->join("students", "students.user_id", "=", "users.id")
            ->leftJoin("students_lessons", "students_lessons.student_id", "=", "students.id")
            ->where("users.ic_number", "=", auth()->user()->ic_number)
            ->get();

        $quiz_progress = DB::table('users')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.ic_number',
                'users.state',
                'users.district',
                'users.school',
                'users.quiz_progress',
                'students_quizes.quiz_id',
                'students_quizes.result_status',
            )
            ->distinct('students_quizes.quiz_id')
            ->join("students", "students.user_id", "=", "users.id")
            ->leftJoin("students_quizes", "students_quizes.student_id", "=", "students.id")
            ->where("users.ic_number", "=", auth()->user()->ic_number)
            ->get();

        $game_progress = DB::table('users')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.ic_number',
                'users.state',
                'users.district',
                'users.school',
                'users.game_progress',
                'students_games.game_id',
            )
            ->distinct('students_games.game_id')
            ->join("students", "students.user_id", "=", "users.id")
            ->leftJoin("students_games", "students_games.student_id", "=", "students.id")
            ->where("users.ic_number", "=", auth()->user()->ic_number)
            ->get();

        return view('user.progress', compact('lesson_progress', 'quiz_progress', 'game_progress'));
    }

    public function faq()
    {

        return view('user.faq');
    }

    public function profil()
    {

        return view('user.student.profile');
    }

    public function statistik()
    {

        return view('user.student.statistik');
    }


    public function gameDemo()
    {

        return view('game.demo.game');
    }

    public function gameDemoDrone()
    {

        return view('game.demo.drone');
    }

    public function Video()
    {
        // dd("masuk");

        return view('user.introductionvideo');
    }
}
