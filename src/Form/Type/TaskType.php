<?php
// src/Form/Type/TaskType.php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $task ='';
        $builder
        ->add('task', TextType::class, ['required'=> true, 'label'=>'Write your task now :'])
        ->add('dueDate', DateType::class)
        ->add('save', SubmitType::class)
            ->setMethod('GET')
            ->setFormFactory('task')
        ;
    }

}