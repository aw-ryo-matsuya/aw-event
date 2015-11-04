<?php

namespace Aw\EventBundle\Form;

use Aw\EventBundle\Constants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Type2Type extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question1', 'checkbox')
            ->add('question2', 'checkbox')
            ->add('question3', 'checkbox')
            ->add('question4', 'checkbox')
            ->add('question5', 'checkbox')
            ->add('question6', 'checkbox')
            ->add('question7', 'checkbox')
            ->add('question8', 'checkbox')
            ->add('question9', 'checkbox')
            ->add('question10', 'checkbox')
            ->add('question11', 'checkbox')
            ->add('question12', 'checkbox')
            ->add('question13', 'checkbox')
            ->add('question14', 'checkbox')
            ->add('question15', 'checkbox')
            ->add('question16', 'checkbox')
            ->add('question17', 'checkbox')
            ->add('question18', 'checkbox')
            ->add('question19', 'checkbox')
            ->add('question20', 'checkbox')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Aw\EventBundle\Entity\Type2'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return Constants::TYPE2;
    }
}
