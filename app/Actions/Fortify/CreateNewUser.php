<?php

namespace App\Actions\Fortify;

use App\Models\SpecialUser;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use CreateTeamUserTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();


        $data   = [
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            "cpf" => $input['cpf'],
            "sexo" => $input['sexo'],
            "dt_nasc" => $input['dt_nasc'],
            "phone" => $input['phone'],
            "cep" => $input['cep'],
            "endereco" => $input['endereco'],
            "bairro" => $input['bairro'],
            "cidade" => $input['cidade'],
            "estado" => $input['estado'],
            "numero" => $input['numero']
        ];
        if ($input['type'] == 'customer') {
            $data['current_team_id'] = 2;
        }

        if ($input['type'] == 'doctor') {
            $data['crm'] = $input['crm'];
            $data['current_team_id'] = 1;
        }

        $user =  User::create($data);


        if ($input['type'] == 'customer') {

            $tu =  TeamUser::create([
                'team_id'    => 2,
                'user_id' => $user->id,
                'role' => 'editor'
            ]);
        }
        if ($input['type'] == 'doctor') {

            SpecialUser::create([
                'special_id'  => $input['special_id'],
                'user_id' => $user->id
            ]);
            TeamUser::create([
                'team_id'    => 1,
                'user_id' => $user->id,
                'role' => 'editor'
            ]);
        }
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0] . "'s Team",
            'personal_team' => true,
        ]));
    }
}
