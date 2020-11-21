<?php

namespace App\Http\Controllers;

use App\Models\Scheduling;
use App\Models\Specials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Schedulings extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specials = Specials::all();
        return view('scheduling.create', ['specials' => $specials]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $office_id = $request->input('office_id');
        $professional_id = $request->input('professional_id');
        $user_id = $request->input('user_id');
        $subject = $request->input('subject');
        $description = $request->input('description');
        $horario = explode(':', str_replace(['am', 'pm'], '', $request->input('horario_consulta')));
        $explodeDate = explode('/', $request->input('data_consulta'));
        $start_date = $explodeDate[2] . '-' . $explodeDate[1] . '-' . $explodeDate[0] . ' ' . $horario[0] . ':' . $horario[1] . ':00';
        $end_date = $explodeDate[2] . '-' . $explodeDate[1] . '-' . $explodeDate[0] . ' ' . ($horario[0] + 1) . ':' . $horario[1] . ':00';


        $scheduling = Scheduling::create([
            'professional_id' => $professional_id,
            'user_id' => $user_id,
            'office_id' => $office_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'subject' => $subject,
            'description' => $description,
        ]);

        return response()->json($scheduling);
    }

    public function getSchedulingOpen(Request $request)
    {
        $special = $request->input('special_id');
        $horario = str_replace(['am', 'pm'], '', $request->input('horario_consulta'));
        $explodeDate = explode('/', $request->input('data_consulta'));
        $date = $explodeDate[2] . '-' . $explodeDate[1] . '-' . $explodeDate[0] . ' ' . $horario . ':00';
        $group_id = User::MEDICO;

        $query = "SELECT DISTINCT u.id as 'user_id', u.name, u.email, u.crm, u.sexo, u.profile_photo_path, o.id as 'office_id', o.name as 'office', o.zip_code, o.address, o.city, o.state, o.neighborhood, o.`long`, o.lat, s.id as 'special_id', s.title as 'special'
        FROM users u JOIN opperation_hours ph ON ph.user_id = u.id
        JOIN offices o ON ph.office_id = o.id
        JOIN special_user su ON su.user_id = u.id
        JOIN specials s ON s.id = su.special_id
        WHERE u.current_team_id = {$group_id} AND s.id = {$special}
        AND u.id not in (SELECT professional_id from schedulings where start_date <= '{$date}' and end_date > '{$date}' and office_id = o.id);";

        $result = DB::select($query);

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $where = "where u.id = {$user_id};";
        if (Auth::user()->current_team_id == User::MEDICO) {
            $where = "where s.professional_id = {$user_id};";
        }

        $schedulings = DB::select("SELECT CONCAT(u.name,' - ',s.subject) as title, start_date as start, end_date as end, subject, description, u.name, ss.title as special, o2.address, o2.name as office from schedulings s
        JOIN users u on u.id = s.user_id
        JOIN offices o2 on o2.id = s.office_id
        JOIN special_user su ON su.user_id = s.professional_id
        JOIN specials ss on ss.id = su.special_id " . $where);
        return view('scheduling.show', ['schedulings' => $schedulings]);
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
