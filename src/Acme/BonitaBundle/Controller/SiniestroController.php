<?php

namespace Acme\BonitaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\BonitaBundle\Entity\Siniestro;
use Acme\BonitaBundle\Form\SiniestroType;

/**
 * Producto controller.
 */
class SiniestroController extends Controller
{

    /**
     * Muestra el formulario para crear un nuevo siniestro
     *
     */
    public function nuevoSiniestroAction()
    {
        $entity = new Siniestro();
        $form = $this->createForm(new SiniestroType(), $entity, array(
            'action' => $this->generateUrl('siniestro_crear'),
            'method' => 'POST'
        ));
        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $this->render('AcmeBonitaBundle:Siniestro:nuevoSiniestro.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * Crea un nuevo siniestro o muestra un mensaje si no se pudo crear y vuelve a mostrar el formulario para crear otro.
     *
     */
    public function crearSiniestroAction(Request $request)
    {
        $siniestro = new Siniestro();
        $form = $this->createForm(new SiniestroType(), $siniestro, array(
            'action' => $this->generateUrl('siniestro_crear'),
            'method' => 'POST'
        ));
        $form->add('submit', 'submit', array('label' => 'Nuevo Siniestro'));
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {

            $tipoIncidenteId = $form->getData()->getTipoIncidenteId()->getId();

            $siniestro->setTipoIncidenteId($tipoIncidenteId);
            $em = $this->getDoctrine()->getManager();
            $em->persist($siniestro);
        var_dump('paso2');
            $em->flush();
        var_dump('paso');

            return $this->redirect($this->generateUrl('siniestro_nuevo'));
        }

        return $this->render('AcmeBonitaBundle:Siniestro:nuevoSiniestro.html.twig', array(
            'form' => $form->createView()
        ));
    }

}
