<?php

namespace App\Form;

use App\Entity\Establishments;
use App\Entity\Reservations;
use App\Entity\Suites;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;

class ReservationsType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder
            ->add('arrival_date', DateType::class, [
                'required' => true])
            ->add('departure_date', DateType::class, [
                'required' => true])

            ->add('establishment', EntityType::class, [
                'class' => Establishments::class,
                'choice_label' => function (Establishments $establishments) {
                    return $establishments->getName();
                },
                'required' => true
            ])
            ->add('suite', EntityType::class, [
                'class' => Suites::class,
                'choice_label' => 'title',
                'required' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservations::class,
        ]);
    }
}
