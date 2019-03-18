<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Origine;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Origine controller.
 *
 * @Route("origine")
 */
class OrigineController extends Controller
{
    /**
     * Lists all origine entities.
     *
     * @Route("/", name="origine_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $origines = $em->getRepository('AppBundle:Origine')->findAll();

        return $this->render('origine/index.html.twig', array(
            'origines' => $origines,
        ));
    }

    /**
     * Creates a new origine entity.
     *
     * @Route("/new", name="origine_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $origine = new Origine();
        $form = $this->createForm('AppBundle\Form\OrigineType', $origine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($origine);
            $em->flush();

            return $this->redirectToRoute('origine_show', array('idAppellation' => $origine->getIdappellation()));
        }

        return $this->render('origine/new.html.twig', array(
            'origine' => $origine,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a origine entity.
     *
     * @Route("/{idAppellation}", name="origine_show")
     * @Method("GET")
     */
    public function showAction(Origine $origine)
    {
        $deleteForm = $this->createDeleteForm($origine);

        return $this->render('origine/show.html.twig', array(
            'origine' => $origine,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing origine entity.
     *
     * @Route("/{idAppellation}/edit", name="origine_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Origine $origine)
    {
        $deleteForm = $this->createDeleteForm($origine);
        $editForm = $this->createForm('AppBundle\Form\OrigineType', $origine);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('origine_edit', array('idAppellation' => $origine->getIdappellation()));
        }

        return $this->render('origine/edit.html.twig', array(
            'origine' => $origine,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a origine entity.
     *
     * @Route("/{idAppellation}", name="origine_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Origine $origine)
    {
        $form = $this->createDeleteForm($origine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($origine);
            $em->flush();
        }

        return $this->redirectToRoute('origine_index');
    }

    /**
     * Creates a form to delete a origine entity.
     *
     * @param Origine $origine The origine entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Origine $origine)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('origine_delete', array('idAppellation' => $origine->getIdappellation())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
