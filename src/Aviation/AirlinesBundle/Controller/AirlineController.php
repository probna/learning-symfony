<?php

namespace Aviation\AirlinesBundle\Controller;

use Aviation\AirlinesBundle\Entity\Country;
use Symfony\Component\VarDumper\VarDumper;
use Aviation\AirlinesBundle\Entity\Airline;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Airline controller.
 *
 * @Route("airlines")
 */
class AirlineController extends Controller {
    /**
     * Lists all airline entities.
     *
     * @Route("/", name="airlines_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $airlines = $em->getRepository('AviationAirlinesBundle:Airline')->findAll();

        return $this->render('airline/index.html.twig', array(
            'airlines' => $airlines,
        ));
    }

    /**
     * Creates a new airline entity.
     *
     * @Route("/new", name="airlines_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $airline = new Airline();
        $form = $this->createForm('Aviation\AirlinesBundle\Form\AirlineType', $airline);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($airline);
            $em->flush();

            return $this->redirectToRoute('airlines_show', array('id' => $airline->getId()));
        }

        return $this->render('airline/new.html.twig', array(
            'airline' => $airline,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a airline entity.
     *
     * @Route("/{id}", name="airlines_show")
     * @Method("GET")
     */
    public function showAction(Airline $airline)
    {
        $deleteForm = $this->createDeleteForm($airline);

        return $this->render('airline/show.html.twig', array(
            'airline' => $airline,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing airline entity.
     *
     * @Route("/{id}/edit", name="airlines_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Airline $airline)
    {
        $deleteForm = $this->createDeleteForm($airline);
        $editForm = $this->createForm('Aviation\AirlinesBundle\Form\AirlineType', $airline);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('airlines_edit', array('id' => $airline->getId()));
        }

        return $this->render('airline/edit.html.twig', array(
            'airline' => $airline,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a airline entity.
     *
     * @Route("/{id}", name="airlines_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Airline $airline)
    {
        $form = $this->createDeleteForm($airline);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($airline);
            $em->flush();
        }

        return $this->redirectToRoute('airlines_index');
    }

    /**
     * Creates a form to delete a airline entity.
     *
     * @param Airline $airline The airline entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Airline $airline)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('airlines_delete', array('id' => $airline->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * Gets airlines by country.
     *
     * @Route("/country/{countryID}", name="airlines_by_country")
     * @Method("GET")
     */
    public function getAirlinesByCountry($countryID)
    {
        echo "something something blahdglsjg";
//        die();


        /*symfony automagija - findbyNESTO radi match na property name u entitetu */
//        $airlines = $this->get('airline.repository')->findByCountry($country);

//        $airlines = $this->get('airline.repository')->findBy(['name' => 'FlyCroatia', 'country' => $country]);
//        $airlines = $this->get('airline.repository')->getAllByNameAndCountry('FlyCroatia', $country);

        foreach ($this->nazovijumirko($countryID) as $airline) {
            VarDumper::dump($airline);

        }
        die();
    }


    public function nazovijumirko(string $countryID)
    {
        return $this->get('aviation.airlines.service.sexy_airlines.top5')->getAirlinesByCountry($countryID);

    }

    /**
     * Gets airlines by name and country.
     *
     * @Route("/getByNameAndCountry", name="airlines_by_name_and_country")
     * @Method("POST")
     */
    public function getAirlinesByNameAndCountry(Request $request)
    {
        $response = VarDumper::dump($request);
        die();
    }
}
