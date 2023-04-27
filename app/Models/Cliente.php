<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//Spatie media
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
/**
 * Class Cliente
 *
 * @property $id
 * @property $id_user
 * @property $dominio
 * @property $empresa
 * @property $contacto
 * @property $telefono
 * @property $telefono2
 * @property $direccion
 * @property $email
 * @property $nit
 * @property $actividad
 * @property $plan
 * @property $metodo_pago
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model implements HasMedia
{
    use InteractsWithMedia;

    static $rules = [
		'dominio' => 'required',
		'empresa' => 'required',
		'contacto' => 'required',
		'telefono' => 'required',
		'email' => 'required',
		'plan' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_user','dominio','empresa','contacto','telefono','telefono2','direccion','email','nit','actividad','plan','metodo_pago','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }


}
