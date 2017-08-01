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

    public function getFullNameAttribute(){
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

    public function order(){
        return $this->hasMany('\App\Order', 'customer_id');
    }

    public function getAlamatAttribute() {
        $alamat = [
            'jalan' => '',
            'no_hp' => '',
            'provinsi' => [
                'id' => '',
                'nama' => ''
            ],
            'kabupaten' => [
                'id' => '',
                'nama' => ''
            ],
            'kecamatan' => [
                'id' => '',
                'nama' => ''
            ],
            'kelurahan' => [
                'id' => '',
                'nama' => ''
            ],
            'alamat' => '',
            'kode_pos' => ''
        ];

        if(count($this->address) > 0) {
            if($this->address->first()->desa_id != null) {
                $kelurahan = \App\Kelurahan::with('kecamatan.kabupaten.provinsi')
                    ->find($this->address->first()->desa_id);
                $alamat['kelurahan']['id'] = $kelurahan->id_kel;
                $alamat['kelurahan']['nama'] = $kelurahan->nama;
                $alamat['kecamatan']['id'] = $kelurahan->kecamatan->id_kec;
                $alamat['kecamatan']['nama'] = $kelurahan->kecamatan->nama;
                $alamat['kabupaten']['id'] = $kelurahan->kecamatan->kabupaten->id_kab;
                $alamat['kabupaten']['nama'] = $kelurahan->kecamatan->kabupaten->nama;
                $alamat['provinsi']['id'] = $kelurahan->kecamatan->kabupaten->provinsi->id_prov;
                $alamat['provinsi']['nama'] = $kelurahan->kecamatan->kabupaten->provinsi->nama;
            }
        }
        return $alamat;
    }

}
