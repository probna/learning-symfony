<?php

namespace Aviation\AirlinesBundle\Controller;

use Aviation\AirlinesBundle\Entity\Airport;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Airport controller.
 *
 * @Route("airport")
 */
class AirportController extends Controller
{
    /**
     * Lists all airport entities.
     *
     * @Route("/", name="airport_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $airports = $em->getRepository('AviationAirlinesBundle:Airport')->findAll();

        return $this->render('airport/index.html.twig', [
            'airports' => $airports,
        ]);
    }

    /**
     * Creates a new airport entity.
     *
     * @Route("/new", name="airport_new")
     * @Method({"GET", "POST"})
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $airport = new Airport();
        $form    = $this->createForm('Aviation\AirlinesBundle\Form\AirportType', $airport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($airport);
            $em->flush();

            return $this->redirectToRoute('airport_show', ['id' => $airport->getId()]);
        }

        return $this->render('airport/new.html.twig', [
            'airport' => $airport,
            'form'    => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a airport entity.
     *
     * @Route("/{id}", name="airport_show")
     * @Method("GET")
     *
     * @param \Aviation\AirlinesBundle\Entity\Airport $airport
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Airport $airport)
    {
        $deleteForm = $this->createDeleteForm($airport);

        return $this->render('airport/show.html.twig', [
            'airport'     => $airport,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing airport entity.
     *
     * @Route("/{id}/edit", name="airport_edit")
     * @Method({"GET", "POST"})
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Aviation\AirlinesBundle\Entity\Airport   $airport
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Airport $airport)
    {
        $deleteForm = $this->createDeleteForm($airport);
        $editForm   = $this->createForm('Aviation\AirlinesBundle\Form\AirportType', $airport);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('airport_edit', ['id' => $airport->getId()]);
        }

        return $this->render('airport/edit.html.twig', [
            'airport'     => $airport,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Deletes a airport entity.
     *
     * @Route("/{id}", name="airport_delete")
     * @Method("DELETE")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Aviation\AirlinesBundle\Entity\Airport   $airport
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, Airport $airport)
    {
        $form = $this->createDeleteForm($airport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($airport);
            $em->flush();
        }

        return $this->redirectToRoute('airport_index');
    }

    /**
     * Creates a form to delete a airport entity.
     *
     * @param Airport $airport The airport entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Airport $airport)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('airport_delete', ['id' => $airport->getId()]))
            ->setMethod('DELETE')
            ->getForm();
    }
}
