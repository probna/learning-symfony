<?php

namespace Aviation\AirlinesBundle\Controller;

use Aviation\AirlinesBundle\Entity\Airport;
use Aviation\AirlinesBundle\Entity\Flight;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Flight controller.
 *
 * @Route("flight")
 */
class FlightController extends Controller
{
    /**
     * Lists all flight entities.
     *
     * @Route("/", name="flight_index")
     * @Method("GET")
     *
     * @throws \InvalidArgumentException
     * @throws \LogicException
     */
    public function indexAction(): Response
    {
        $em = $this->getDoctrine()->getManager();

        $flights = $em->getRepository('AviationAirlinesBundle:Flight')->findAll();

        return $this->render('AviationAirlinesBundle:flight:index.html.twig', [
            'flights' => $flights,
        ]);
    }

    /**
     * Creates a new flight entity.
     *
     * @Route("/new", name="flight_new")
     * @Method({"GET", "POST"})
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function newAction(Request $request)
    {
        $flight = new Flight();
        $form   = $this->createForm('Aviation\AirlinesBundle\Form\FlightType', $flight);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($flight);
            $em->flush();

            return $this->redirectToRoute('flight_show', ['id' => $flight->getId()]);
        }

        return $this->render('AviationAirlinesBundle:flight:new.html.twig', [
            'flight' => $flight,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a flight entity.
     *
     * @Route("/{id}", name="flight_show")
     * @Method("GET")
     *
     * @param \Aviation\AirlinesBundle\Entity\Flight $flight
     *
     * @return Response
     */
    public function showAction(Flight $flight): Response
    {
        $deleteForm = $this->createDeleteForm($flight);

        return $this->render('AviationAirlinesBundle:flight:show.html.twig', [
            'flight'      => $flight,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing flight entity.
     *
     * @Route("/{id}/edit", name="flight_edit")
     * @Method({"GET", "POST"})
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Aviation\AirlinesBundle\Entity\Flight    $flight
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function editAction(Request $request, Flight $flight)
    {
        $deleteForm = $this->createDeleteForm($flight);
        $editForm   = $this->createForm('Aviation\AirlinesBundle\Form\FlightType', $flight);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('flight_edit', ['id' => $flight->getId()]);
        }

        return $this->render('AviationAirlinesBundle:flight:edit.html.twig', [
            'flight'      => $flight,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Deletes a flight entity.
     *
     * @Route("/{id}", name="flight_delete")
     * @Method("DELETE")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Aviation\AirlinesBundle\Entity\Flight    $flight
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, Flight $flight): RedirectResponse
    {
        $form = $this->createDeleteForm($flight);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($flight);
            $em->flush();
        }

        return $this->redirectToRoute('flight_index');
    }

    /**
     * Creates a form to delete a flight entity.
     *
     * @param Flight $flight The flight entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Flight $flight)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('flight_delete', ['id' => $flight->getId()]))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * Gets outbound flights from an airport.
     *
     * @param \Aviation\AirlinesBundle\Entity\Airport $airport
     *
     * @return Response
     *
     * @Route("/from/{id}", name="outbound_flight_from")
     *
     * @Method("GET")
     */
    public function showFlightsFrom(Airport $airport): Response
    {
        $flights = $this->get('aviation.repository.flights')->findByDepartureAirport($airport);

        return $this->render('AviationAirlinesBundle:flight:flightList.html.twig', [
            'flights' => $flights,
        ]);
    }
}
