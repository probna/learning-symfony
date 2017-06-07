<?php

namespace MiroBundle\Controller;

use MiroBundle\Entity\blah;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Blah controller.
 *
 * @Route("blah")
 */
class blahController extends Controller
{
    /**
     * Lists all blah entities.
     *
     * @Route("/", name="blah_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $blahs = $em->getRepository('MiroBundle:blah')->findAll();

        return $this->render('blah/index.html.twig', [
            'blahs' => $blahs,
        ]);
    }

    /**
     * Creates a new blah entity.
     *
     * @Route("/new", name="blah_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $blah = new Blah();
        $form = $this->createForm('MiroBundle\Form\blahType', $blah);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($blah);
            $em->flush();

            return $this->redirectToRoute('blah_show', ['id' => $blah->getId()]);
        }

        return $this->render('blah/new.html.twig', [
            'blah' => $blah,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a blah entity.
     *
     * @Route("/{id}", name="blah_show")
     * @Method("GET")
     */
    public function showAction(blah $blah)
    {
        var_dump($blah->getName());
        $deleteForm = $this->createDeleteForm($blah);

        return $this->render('blah/show.html.twig', [
            'blah'        => $blah,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing blah entity.
     *
     * @Route("/{id}/edit", name="blah_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, blah $blah)
    {
        $deleteForm = $this->createDeleteForm($blah);
        $editForm   = $this->createForm('MiroBundle\Form\blahType', $blah);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('blah_edit', ['id' => $blah->getId()]);
        }

        return $this->render('blah/edit.html.twig', [
            'blah'        => $blah,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Deletes a blah entity.
     *
     * @Route("/{id}", name="blah_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, blah $blah)
    {
        $form = $this->createDeleteForm($blah);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($blah);
            $em->flush();
        }

        return $this->redirectToRoute('blah_index');
    }

    /**
     * Creates a form to delete a blah entity.
     *
     * @param blah $blah The blah entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(blah $blah)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blah_delete', ['id' => $blah->getId()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
