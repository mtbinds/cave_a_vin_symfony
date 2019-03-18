<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Vin controller.
 *
 * @Route("vin")
 */
class VinController extends Controller
{
    /**
     * Lists all vin entities.
     *
     * @Route("/", name="vin_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vins = $em->getRepository('AppBundle:Vin')->findAll();

        return $this->render('vin/index.html.twig', array(
            'vins' => $vins,
        ));
    }

    /**
     * Creates a new vin entity.
     *
     * @Route("/new", name="vin_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vin = new Vin();
        $form = $this->createForm('AppBundle\Form\VinType', $vin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vin);
            $em->flush();

            return $this->redirectToRoute('vin_show', array('idVin' => $vin->getIdvin()));
        }

        return $this->render('vin/new.html.twig', array(
            'vin' => $vin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vin entity.
     *
     * @Route("/{idVin}", name="vin_show")
     * @Method("GET")
     */
    public function showAction(Vin $vin)
    {
        $deleteForm = $this->createDeleteForm($vin);

        return $this->render('vin/show.html.twig', array(
            'vin' => $vin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vin entity.
     *
     * @Route("/{idVin}/edit", name="vin_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Vin $vin)
    {
        $deleteForm = $this->createDeleteForm($vin);
        $editForm = $this->createForm('AppBundle\Form\VinType', $vin);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vin_edit', array('idVin' => $vin->getIdvin()));
        }

        return $this->render('vin/edit.html.twig', array(
            'vin' => $vin,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vin entity.
     *
     * @Route("/{idVin}", name="vin_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Vin $vin)
    {
        $form = $this->createDeleteForm($vin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vin);
            $em->flush();
        }

        return $this->redirectToRoute('vin_index');
    }

    /**
     * Creates a form to delete a vin entity.
     *
     * @param Vin $vin The vin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vin $vin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vin_delete', array('idVin' => $vin->getIdvin())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
