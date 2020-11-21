<?php

namespace App\Http\Controllers;

use App\Models\Offices;
use App\Models\OpperationHours;
use App\Models\Specials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Operator;

class User extends Controller
{
    CONST MEDICO = 1;
    CONST PACIENTE = 2;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specials = Specials::all();
        return view('user.register-doctor', ['specials' => $specials]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agenda()
    {
        $hours = OpperationHours::where('user_id', Auth::user()->id)->get();
        $offices = Offices::all();
        return view('user.agenda-doctor', ['offices' => $offices, 'hours' => $hours]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeAgenda($user_id, Request $request)
    {
        foreach ($request->input('weekday') as $key => $day) {
            if (!isset($request->input('off')[$key])) {
                OpperationHours::create([
                    'start' => $request->input('hours_start')[$key] . ':00',
                    'end' => $request->input('hours_end')[$key] . ':00',
                    'full_open' => 0,
                    'holiday' => 0,
                    'weekday' => $day,
                    'user_id' => $user_id,
                    'office_id' => $request->input('doutor_localidade'),
                ]);
            }
        }
        return redirect('/dashboard');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
