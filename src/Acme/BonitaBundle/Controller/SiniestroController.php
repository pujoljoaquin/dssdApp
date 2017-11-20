<?php

namespace Acme\BonitaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\BonitaBundle\Entity\Siniestro;
use Acme\BuffetBundle\Entity\Estado;
use Acme\BuffetBundle\Entity\TipoIncidente;
use Acme\BonitaBundle\Form\SiniestroType;

/**
 * Siniestro controller.
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
        $form->add('submit', 'submit', array('label' => 'Agregar Objeto a Indemnizar'));

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
        $form->add('submit', 'submit', array('label' => 'Agregar Objeto a Indemnizar'));
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {

            $tipoIncidenteId = $form->getData()->getTipoIncidenteId()->getId();
            $idUsuarioActual = $this->container->get('security.context')->getToken()->getUser()->getId();

            $siniestro->setTipoIncidenteId($tipoIncidenteId);
            $siniestro->setCantidadObjetosIndemnizacion(0);
            $siniestro->setEstadoId(1);
            $siniestro->setUsuarioId($idUsuarioActual);
            $em = $this->getDoctrine()->getManager();
            $em->persist($siniestro);
            $em->flush();

            setcookie('siniestroId', $siniestro->getId(), 0,'/');

            return $this->redirect($this->generateUrl('objeto_indemnizacion_nuevo'));
        }

        return $this->render('AcmeBonitaBundle:Siniestro:nuevoSiniestro.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function indexSiniestrosAction(Request $request) {
        $idUsuarioActual = $this->container->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AcmeBonitaBundle:Siniestro')
            ->createQueryBuilder('s')
            ->where('s.usuarioId = :usuarioId')
            ->setParameter(':usuarioId', $idUsuarioActual)
            ->getQuery();
        $siniestros = $repository->getResult();
        $tipoSiniestros = $em->getRepository('AcmeBonitaBundle:TipoIncidente')->findAll();
        $estadosSiniestros = $em->getRepository('AcmeBonitaBundle:Estado')->findAll();

        //return $this->render('AcmeBonitaBundle:Siniestro:indexSiniestros.html.twig', array(
           // 'tipoSiniestros' => $tipoSiniestros,
           // 'estadosSiniestros' => $estadosSiniestros,
          //  'form' => $form->createView()
        //));

        return $this->render('AcmeBonitaBundle:Siniestro:indexSiniestros.html.twig', array(
            'tipoSiniestros' => $tipoSiniestros,
            'estadosSiniestros' => $estadosSiniestros,
            'siniestros' => $siniestros));

    }

}
