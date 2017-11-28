<?php

namespace Acme\BonitaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\BonitaBundle\Entity\ObjetoIndemnizacion;
use Acme\BonitaBundle\Form\ObjetoIndemnizacionType;

/**
 * Objeto Indemnizacion controller.
 */
class ObjetoIndemnizacionController extends Controller
{

    /**
     * Muestra el formulario para crear un nuevo objeto indemnizacion
     *
     */
    public function nuevoObjetoIndemnizacionAction()
    {

        $entity = new ObjetoIndemnizacion();
        $form = $this->createForm(new ObjetoIndemnizacionType(), $entity, array(
            'action' => $this->generateUrl('objeto_indemnizacion_crear'),
            'method' => 'POST'
        ));
        $form->add('submit', 'submit', array('label' => 'Agregar objeto'));
        $form->add('submit1', 'submit', array('label' => 'Finalizar Siniestro'));

        return $this->render('AcmeBonitaBundle:ObjetoIndemnizacion:nuevoObjetoIndemnizacion.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * Crea un nuevo objeto indemnizacion o muestra un mensaje si no se pudo crear y vuelve a mostrar el formulario para crear otro.
     *
     */
    public function crearObjetoIndemnizacionAction(Request $request)
    {
        $objetoIndemnizacion = new ObjetoIndemnizacion();
        $form = $this->createForm(new ObjetoIndemnizacionType(), $objetoIndemnizacion, array(
            'action' => $this->generateUrl('objeto_indemnizacion_crear'),
            'method' => 'POST'
        ));

        $form->add('submit', 'submit', array('label' => 'Agregar objeto'));
        $form->add('submit1', 'submit', array('label' => 'Finalizar Siniestro'));
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {

            $objetoIndemnizacion->setSiniestroId($_COOKIE['siniestroId']);
            $em = $this->getDoctrine()->getManager();
            $em->persist($objetoIndemnizacion);
            $em->flush();

            if ($form->get('submit')->isClicked()) {
                return $this->redirect($this->generateUrl('objeto_indemnizacion_nuevo'));
            } else {
                $em = $this->getDoctrine()->getManager();
                $query = $em->getRepository('AcmeBonitaBundle:ObjetoIndemnizacion')
                     ->createQueryBuilder('o')
                     ->where('o.siniestro_id = :idSiniestro')
                     ->setParameter('idSiniestro', $_COOKIE['siniestroId'])
                     ->getQuery();
                $resultado = $query->getResult();
                $i = 0;
                $cantObjetosIndemnizar = 0;
                while (isset($resultado[$i])) {
                    $cantObjetosIndemnizar++;
                    $i++;
                };

                $em = $this->getDoctrine()->getManager();
                $siniestro = $em->getRepository('AcmeBonitaBundle:Siniestro')->find($_COOKIE['siniestroId']);
                $siniestro->setCantidadObjetosIndemnizacion($cantObjetosIndemnizar);
                $em->persist($siniestro);
                $em->flush();
                return $this->render('AcmeBonitaBundle:Mensaje:mensaje.html.twig', array(
                    'mensaje' => 'El siniestro ha sido creado con exito!',
                    'volver' => 'siniestro_nuevo'
                ));
            }

        }

        return $this->render('AcmeBonitaBundle:ObjetoIndemnizacion:nuevoObjetoIndemnizacion.html.twig', array(
            'form' => $form->createView()
        ));
    }

}
