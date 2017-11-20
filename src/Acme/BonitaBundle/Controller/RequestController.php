<?php

namespace Acme\BonitaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class RequestController extends Controller
{

    public static function doTheRequest($method, $uri, $variable=null, $data=null){
        
        $request = Request::create(
            $uri,
            $method,
            array('X-Bonita-API-Token' => 'Fabien')
        );


        $response = array();
        $client = Access::getGuzzleClient();
        try {
            //Si el método es POST, hago el request con un header con la variable de sesion         
            if ($method == 'POST'){
                $jar = new \GuzzleHttp\Cookie\CookieJar();
                $request = $client->request($method, $uri,
                    ['headers' => [
                        'X-Bonita-API-Token' => $_SESSION['X-Bonita-API-Token']
                        ]
                    ]);
                $tareas = $request->getBody();
                $response['success'] = true;
                $response['data'] = json_decode($tareas);

            }
            else{
                if ($method == 'PUT'){
                    $jar = new \GuzzleHttp\Cookie\CookieJar();
                    $request = $client->request($method, $uri,
                        ['headers' => [
                            'X-Bonita-API-Token' => $_SESSION['X-Bonita-API-Token']
                            ],
                         'json' => [
                            'type' => 'java.lang.Integer',
                            'value'=> $data
                            ]                           
                        ]);
                    $tareas = $request->getBody();
                    $response['success'] = true;
                    $response['data'] = json_decode($tareas);
                }
                else {
                    $request = $client->request($method, $uri);
                    $tareas = $request->getBody();
                    $response['success'] = true;
                    $response['data'] = json_decode($tareas);
                }
            }
            //Si el metodo es GET, lo hago directamente.
            


        } catch (RequestException $e) {
            $response['success'] = false;
            $response['message'] = $e->getResponse()->getStatusCode() . ' - ' . $e->getResponse()->getReasonPhrase();
            $response['data'] = [];
        }
        return $response;
    }
}
