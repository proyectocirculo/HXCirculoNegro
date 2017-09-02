<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Articulos;
use Illuminate\Support\Facades\Log;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
   {
    // $client = new \GuzzleHttp\Client();
    //
    // $response = $client->request('POST', 'https://190.57.231.34:8444/servicios/oauth/token?grant_type=password&username=borras&password=17borrAs*', [
    //     'headers' => [
    //         'Authorization' => 'Basic bXktdHJ1c3RlZC1jbGllbnQ6c2VjcmV0',
    //         'Accept'     => 'application/json',
    //         'Content-Type'      => 'application/json'
    //     ],
    //     'verify' => false
    //   ]
    //   );
    //   $obj = json_decode($response->getBody());
    //
    // // echo "<pre>";
    // //   var_dump($obj->access_token);
    // // echo "<pre>";
    // $token = $obj->access_token;
    //
    // $clientlistaprecio = new \GuzzleHttp\Client();
    //
    // $responselistaprecio = $clientlistaprecio->request('POST', 'https://190.57.231.34:8444/servicios/ws/getArticulos/?pkCliente={"PkCliente": {    "idCliente": "102",    "idComercio": "1",    "idSucursal": "1"  }}&access_token='.$token, [
    //     'headers' => [
    //         'Accept'     => 'application/json',
    //         'Content-Type'      => 'application/json'
    //     ],
    //     'verify' => false
    //   ]
    // );
    //
    //  $articulos= json_decode($responselistaprecio->getBody())->articulosUltraWeb;
    //  foreach ($articulos as $articulo) {
    //    $art = new articulos;
    //    $art->id_articulo = $articulo->id;
    //    $art->id_marca = $articulo->idMarca;
    //    $art->idrubro = $articulo->idRubro;
    //    $art->idsubrubro = $articulo->idSubrubro;
    //    $art->idproveedor = $articulo->idProveedor;
    //    $art->preciobase = $articulo->precioBase ;
    //    $art->snactivo = $articulo->snActivo;
    //    $art->unidadporbulto = $articulo->unidadPorBulto ;
    //    $art->preciofinal = $articulo->prFinal ;
    //    $art->precioneto = $articulo->prNeto ;
    //    $art->preciosiniva =  $articulo->prSIva;
    //    $art->nombredearticulos = $articulo->deArticulos ;
    //    $art->stock_real = $articulo->stock;
    //    $art->idempresa = $articulo->idEmpresa;
    //    $art->save();
    //    var_dump('guardado');
    //  }
    //  var_dump('terminado');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
