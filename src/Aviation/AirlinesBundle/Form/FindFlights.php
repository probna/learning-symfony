<?php

namespace Aviation\AirlinesBundle\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Translation\Tests\StringClass;
use Symfony\Component\Validator\Constraints\DateTime;

class FindFlights extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('From', TextType::class)
            ->add('To', TextType::class)
            ->add('On/At', DateTime::class)
            ->add('Search', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'aviation_airlines_bundle_find_flights';
    }
}
