<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mpociot\Teamwork\Traits\UserHasTeams;

class User extends Authenticatable
{
    use Notifiable;
    use UserHasTeams;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 'apellidos', 'email', 'password', 'telefono', 'clave_unica', 'tipo', 'foto_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'id', 'password', 'remember_token'
    ];

    public function equipo(){

    return belongsTo('teams');
}
}
