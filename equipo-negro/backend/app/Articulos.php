<?php

namespace App;

use Eloquent as Model;

/**
 * Class pom
 * @package App\Models
 * @version September 22, 2016, 7:51 pm UTC
 */
class Articulos extends Model
{

    public $table = 'articulos';


    public $fillable = [
      'id',
      'id_articulo',
      'id_marca',
      'idrubro',
      'idsubrubro',
      'idproveedor',
      'preciobase',
      'snactivo',
      'unidadporbulto',
      'preciofinal',
      'precioneto',
      'preciosiniva',
      'nombredearticulos',
      'idempresa',
      'stock_real',
      'nombre_marca',
      'nombre_rubro',
      'nombre_subrubro',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
      'id' => 'integer',
      'id_articulo' => 'string',
      'id_marca' => 'string',
      'idrubro' => 'string',
      'idsubrubro' => 'string',
      'idproveedor' => 'string',
      'preciobase' => 'string',
      'snactivo' => 'string',
      'unidadporbulto' => 'string',
      'preciofinal' => 'string',
      'precioneto' => 'string',
      'preciosiniva' => 'string',
      'nombredearticulos' => 'string',
      'idempresa' => 'string',
      'stock_real' => 'string',
      'nombre_marca' => 'string',
      'nombre_rubro' => 'string',
      'nombre_subrubro' => 'string',
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
