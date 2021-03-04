<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\School;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class MembersController extends Controller
{
    protected $schools;
    protected $schoolModel;

    public function  __construct(School $schoolModel)
    {
        $this->schools = ['schools' => $schoolModel->all()];
        $this->schoolModel = $schoolModel;
    }

    /**
     * Display a listing of the schools.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {
        return view("members.list", $this->schools);
    }

    /**
     * Show the form for creating a new member.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        return view("members.new", $this->schools);
    }

    /**
     * Store a newly created member in storage.
     *
     * @param Request $request
     * @return Application|Factory|\Illuminate\Contracts\View\View|Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:filter|max:255|unique:members,email',
            'school' => 'required|integer|exists:schools,id'
        ]);

        $member = new Member();
        $member->name = $request['name'];
        $member->email = $request['email'];
        $success = $member->save();
        $member->schools()->attach($request['school']);
        if ($success) {
            return redirect()->route('list_members', ['school_id' => $request['school']]);
        }
        return view("members.show", $this->schools);
    }

    /**
     * Display the members of school
     *
     * @param $school_id
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function show(int $school_id)
    {
        $school = $this->schoolModel->find($school_id);
        try {
            $members = $school->members;
        } catch (\Exception $exception) {
            abort(404);
        }

        return view("members.show", ['school' => $school, 'members' => $members]);

    }

}
