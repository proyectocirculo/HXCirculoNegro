<?php

namespace App\Http\Controllers;



class SoapController extends Controller
{    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function articulos(){

        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://190.57.231.34:8444/servicios/oauth/token?grant_type=password&username=borras&password=17borrAs*', [
            'headers' => [
                'Authorization' => 'Basic bXktdHJ1c3RlZC1jbGllbnQ6c2VjcmV0',
                'Accept'     => 'application/json',
                'Content-Type'      => 'application/json'
            ],
            'verify' => false
          ]
          );
          $obj = json_decode($response->getBody());

        // echo "<pre>";
        //   var_dump($obj->access_token);
        // echo "<pre>";
        $token = $obj->access_token;

        $clientlistaprecio = new \GuzzleHttp\Client();

        $responselistaprecio = $clientlistaprecio->request('POST', 'https://190.57.231.34:8444/servicios/ws/getArticulos/?pkCliente={"PkCliente": {    "idCliente": "16947",    "idComercio": "1",    "idSucursal": "1"  }}&access_token='.$token, [
            'headers' => [
                'Accept'     => 'application/json',
                'Content-Type'      => 'application/json'
            ],
            'verify' => false
          ]
        );
        
        return $responselistaprecio->getBody();
    }

    public function articulosall(){

      $client = new \GuzzleHttp\Client();

      $response = $client->request('POST', 'https://190.57.231.34:8444/servicios/oauth/token?grant_type=password&username=borras&password=17borrAs*', [
          'headers' => [
              'Authorization' => 'Basic bXktdHJ1c3RlZC1jbGllbnQ6c2VjcmV0',
              'Accept'     => 'application/json',
              'Content-Type'      => 'application/json'
          ],
          'verify' => false
        ]
        );
        $obj = json_decode($response->getBody());

      // echo "<pre>";
      //   var_dump($obj->access_token);
      // echo "<pre>";
      $token = $obj->access_token;

      $clientlistaprecio = new \GuzzleHttp\Client();

      $responselistaprecio = $clientlistaprecio->request('POST', 'https://190.57.231.34:8444/servicios/ws/getArticulos/?access_token='.$token, [
          'headers' => [
              'Accept'     => 'application/json',
              'Content-Type'      => 'application/json'
          ],
          'verify' => false
        ]
      );

      return $responselistaprecio->getBody();

    }

    public function articuloslista(){

        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://190.57.231.34:8444/servicios/oauth/token?grant_type=password&username=borras&password=17borrAs*', [
            'headers' => [
                'Authorization' => 'Basic bXktdHJ1c3RlZC1jbGllbnQ6c2VjcmV0',
                'Accept'     => 'application/json',
                'Content-Type'      => 'application/json'
            ],
            'verify' => false
          ]
          );
          $obj = json_decode($response->getBody());

        // echo "<pre>";
        //   var_dump($obj->access_token);
        // echo "<pre>";
        $token = $obj->access_token;

        $clientlistaprecio = new \GuzzleHttp\Client();

        $responselistaprecio = $clientlistaprecio->request('POST', 'https://190.57.231.34:8444/servicios/ws//getArticulosLista/?access_token='.$token, [
            'headers' => [
                'Accept'     => 'application/json',
                'Content-Type'      => 'application/json'
            ],
            'verify' => false
          ]
        );

        return $responselistaprecio->getBody();
    }

    public function clientes(){

      $client = new \GuzzleHttp\Client();

      $response = $client->request('POST', 'https://190.57.231.34:8444/servicios/oauth/token?grant_type=password&username=borras&password=17borrAs*', [
          'headers' => [
              'Authorization' => 'Basic bXktdHJ1c3RlZC1jbGllbnQ6c2VjcmV0',
              'Accept'     => 'application/json',
              'Content-Type'      => 'application/json'
          ],
          'verify' => false
        ]
        );
      $obj = json_decode($response->getBody());

      // echo "<pre>";
      //   var_dump($obj->access_token);
      // echo "<pre>";
      $token = $obj->access_token;

      $clientlistaprecio = new \GuzzleHttp\Client();

      $responselistaprecio = $clientlistaprecio->request('POST', 'https://190.57.231.34:8444/servicios/ws/getClientes/?access_token='.$token, [
          'headers' => [
              'Accept'     => 'application/json',
              'Content-Type'      => 'application/json'
          ],
          'verify' => false
        ]
      );

      return $responselistaprecio->getBody();

    }

    public function precios(){

      $client = new \GuzzleHttp\Client();

      $response = $client->request('POST', 'https://190.57.231.34:8444/servicios/oauth/token?grant_type=password&username=borras&password=17borrAs*', [
          'headers' => [
              'Authorization' => 'Basic bXktdHJ1c3RlZC1jbGllbnQ6c2VjcmV0',
              'Accept'     => 'application/json',
              'Content-Type'      => 'application/json'
          ],
          'verify' => false
        ]
        );
      $obj = json_decode($response->getBody());

      // echo "<pre>";
      //   var_dump($obj->access_token);
      // echo "<pre>";
      $token = $obj->access_token;

      $clientlistaprecio = new \GuzzleHttp\Client();

      $responselistaprecio = $clientlistaprecio->request('POST', 'https://190.57.231.34:8444/servicios/ws/getListasPrecio/?access_token='.$token, [
          'headers' => [
              'Accept'     => 'application/json',
              'Content-Type'      => 'application/json'
          ],
          'verify' => false
        ]
      );

      return $responselistaprecio->getBody();

    }

    public function preciosdetalles(){

      $client = new \GuzzleHttp\Client();

      $response = $client->request('POST', 'https://190.57.231.34:8444/servicios/oauth/token?grant_type=password&username=borras&password=17borrAs*', [
          'headers' => [
              'Authorization' => 'Basic bXktdHJ1c3RlZC1jbGllbnQ6c2VjcmV0',
              'Accept'     => 'application/json',
              'Content-Type'      => 'application/json'
          ],
          'verify' => false
        ]
        );
      $obj = json_decode($response->getBody());

      // echo "<pre>";
      //   var_dump($obj->access_token);
      // echo "<pre>";
      $token = $obj->access_token;

      $clientlistaprecio = new \GuzzleHttp\Client();

      $responselistaprecio = $clientlistaprecio->request('POST', 'https://190.57.231.34:8444/servicios/ws/getListasPrecioDetalles/?access_token='.$token, [
          'headers' => [
              'Accept'     => 'application/json',
              'Content-Type'      => 'application/json'
          ],
          'verify' => false
        ]
      );

      return $responselistaprecio->getBody();

    }

    public function marcaslineas(){

      $client = new \GuzzleHttp\Client();

      $response = $client->request('POST', 'https://190.57.231.34:8444/servicios/oauth/token?grant_type=password&username=borras&password=17borrAs*', [
          'headers' => [
              'Authorization' => 'Basic bXktdHJ1c3RlZC1jbGllbnQ6c2VjcmV0',
              'Accept'     => 'application/json',
              'Content-Type'      => 'application/json'
          ],
          'verify' => false
        ]
        );
      $obj = json_decode($response->getBody());

      // echo "<pre>";
      //   var_dump($obj->access_token);
      // echo "<pre>";
      $token = $obj->access_token;

      $clientlistaprecio = new \GuzzleHttp\Client();

      $responselistaprecio = $clientlistaprecio->request('POST', 'https://190.57.231.34:8444/servicios/ws/getLineas/?access_token='.$token, [
          'headers' => [
              'Accept'     => 'application/json',
              'Content-Type'      => 'application/json'
          ],
          'verify' => false
        ]
      );

      return $responselistaprecio->getBody();

    }

    public function verpedidos(){

      $client = new \GuzzleHttp\Client();

      $response = $client->request('POST', 'https://190.57.231.34:8444/servicios/oauth/token?grant_type=password&username=borras&password=17borrAs*', [
          'headers' => [
              'Authorization' => 'Basic bXktdHJ1c3RlZC1jbGllbnQ6c2VjcmV0',
              'Accept'     => 'application/json',
              'Content-Type'      => 'application/json'
          ],
          'verify' => false
        ]
        );
      $obj = json_decode($response->getBody());

      // echo "<pre>";
      //   var_dump($obj->access_token);
      // echo "<pre>";
      $token = $obj->access_token;

      $clientlistaprecio = new \GuzzleHttp\Client();

      $responselistaprecio = $clientlistaprecio->request('POST', 'https://190.57.231.34:8444/servicios/ws/getPedidos?pkCliente={"PkCliente":{"idCliente":4009,"idComercio":1,"idSucursal":1}}&fechaDesde=01/04/2017&fechaHasta=30/06/2017&access_token='.$token, [
          'headers' => [
              'Accept'     => 'application/json',
              'Content-Type'      => 'application/json'
          ],
          'verify' => false
        ]
      );

      return $responselistaprecio->getBody();

    }

}
