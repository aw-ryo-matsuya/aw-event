<?php

namespace Aw\EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TypeFormType extends AbstractType
{
    private $iterator;

    public function __construct($iterator)
    {
        $this->iterator = $iterator;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        for ($i=1; $i<=20; $i++) {
            $builder->add('question' . $i, 'checkbox');
        }
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'required'   => false,
            'data_class' => 'Aw\EventBundle\Entity\Type' . $this->iterator
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'type' . $this->iterator;
    }
}
