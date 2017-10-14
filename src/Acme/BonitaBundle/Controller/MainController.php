<?php

namespace Acme\BonitaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MainController extends Controller
{

    /**
     * Redirecciona a la pagina principal del sistema.
     *
     */
    public function inicioAction()
    {
        return $this->render('AcmeBonitaBundle:Main:index.html.twig');
    }


    /**
     * Redirecciona a la pagina de acceso denegado
     *
     */
    public function accesoProhibidoAction()
    {
        return $this->render('AcmeBonitaBundle:Main:accesoProhibido.html.twig');
    }
}
