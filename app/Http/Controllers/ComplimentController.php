<?php

namespace App\Http\Controllers;

use App\Compliment;
use App\User;
use App\Notifications\ComplimentReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplimentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function given() {

        $user = Auth::user();

        return view('compliments.given', ["user" => $user]);

    }

    public function received() {

        $user = Auth::user();

        return view('compliments.received', ["user" => $user]);

    }

    public function giveCompliment() {
        if ((int)request()->get('to_id') !==  Auth::user()->id) {
            $compliment = new Compliment();
            $compliment->to_id = request()->get('to_id');
            $compliment->content = request()->get('compliment');

            Auth::user()->givenCompliments()->save($compliment);

            $compliment = request()->get('compliment');
            $id = request()->get('to_id');

            User::find($id)->notify(new ComplimentReceived($compliment));

            session()->flash('alert-success', 'Your compliment was successfully sent! (' . $compliment . ')');
            return redirect()->back();

        }else{
            session()->flash('alert-danger', 'You cannot give yourself a compliment!');
            return redirect()->back();
        }
    }
}
