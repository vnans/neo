<?php

namespace App\Form;

use App\Entity\Scout;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ScoutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomprenoms')
            ->add('datenaiss')
            ->add('lieunaiss')
            ->add('nationalite')
            ->add('tel')
            ->add('boitepostal')
            ->add('paroisse')
            ->add('baptise')
            ->add('baptisepar')
            ->add('datebapteme')
            ->add('lieubapteme')
            ->add('fonctionparoisse')
            ->add('datescout')
            ->add('datepromesse')
            ->add('lieupromesse')
            ->add('fctscoutactu')
            ->add('datenomi')
            ->add('stage1')
            ->add('stage1date')
            ->add('stage1lieu')
            ->add('stage2')
            ->add('stage2date')
            ->add('stage2lieu')
            ->add('stage3')
            ->add('stage3date')
            ->add('stage3lieu')
            ->add('stageinter1')
            ->add('stageinter1date')
            ->add('stageinter1lieu')
            ->add('stageinter2')
            ->add('stageinter2date')
            ->add('stageinter2lieu')
            ->add('profession')
            ->add('img', Filetype::class, array('label' => 'Choisir une image','data_class'=>null))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Scout::class,
        ]);
    }
}
