<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function fullName(){
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function kebutuhanKulit() {
        return $this->hasMany('\App\Personalisasi', 'id', 'kebutuhan_kulit');
    }

    public function kebutuhanRambut() {
        return $this->hasMany('\App\Personalisasi', 'id', 'kebutuhan_rambut');
    }

    public function jenisKulit() {
        return $this->hasMany('\App\Personalisasi', 'id', 'jenis_kulit');
    }

    public function jenisRambut() {
        return $this->hasMany('\App\Personalisasi', 'id', 'jenis_rambut');
    }

    public function whistList() {
        return $this->hasMany('\App\WhistList', 'user_id');
    }

    public function address() {
        return $this->hasMany('\App\Address', 'user_id');
    }

}
