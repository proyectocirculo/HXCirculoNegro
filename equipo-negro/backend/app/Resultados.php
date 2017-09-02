<?php

namespace App;

use Eloquent as Model;

/**
 * Class pom
 * @package App\Models
 * @version September 22, 2016, 7:51 pm UTC
 */
class Resultados extends Model
{

    public $table = 'resultados';


    public $fillable = [
      'id',
      'coords',
      'name',
      'state',
      'link',
      'nameopcionuno',
      'descripcionopcionuno',
      'probabilidadesopcionuno',
      'nameopciondos',
      'descripcionopciondos',
      'probabilidadesopciondos',
      'nombreopcioncorrecta',
      'descripcionopcioncorrecta',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
      'id' => 'integer',
      'coords' => 'string',
      'name' => 'string',
      'state' => 'string',
      'link' => 'string',
      'nameopcionuno' => 'string',
      'descripcionopcionuno' => 'string',
      'probabilidadesopcionuno' => 'string',
      'nameopciondos' => 'string',
      'descripcionopciondos' => 'string',
      'probabilidadesopciondos' => 'string',
      'nombreopcioncorrecta' => 'string',
      'descripcionopcioncorrecta' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/

}
