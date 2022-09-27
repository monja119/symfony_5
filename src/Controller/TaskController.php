<?php
// src/Controller/TaskController.php
namespace App\Controller;

use App\Entity\Task;
use App\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormBuilderInterface;

class TaskController extends AbstractController
{
    #[Route('/task', name: 'task')]
    public function new(Request $request, FormFactoryInterface $formFactory): Response
    {
        // creates a task object and initializes some data for this example
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form = $formFactory->createNamed('task', TaskType::class, $task);


        return $this->render('form/task.html.twig', ['form'=>$form->createView()]);
    }
}