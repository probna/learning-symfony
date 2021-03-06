<?php

namespace Aviation\AirlinesBundle\Form;

use Aviation\AirlinesBundle\Entity\Airport;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class FindFlightsType extends AbstractType
{
    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array                                        $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('DepartureAirport', EntityType::class, ['class' => Airport::class, 'label' => 'Departure Airport Name'])
            ->add('ArrivalAirport', EntityType::class, ['class' => Airport::class, 'label' => 'Destination Airport Name'])
            ->add('Date', DateType::class)
            ->add('Search', SubmitType::class, ['attr' => ['class' => 'btn btn-lg btn-success btn-block']]);
    }
}
