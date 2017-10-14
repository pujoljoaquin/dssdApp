<?php

namespace Acme\BonitaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeBonitaBundle:Default:index.html.twig');
    }
}
