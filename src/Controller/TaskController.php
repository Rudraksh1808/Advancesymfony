<?php

 

namespace App\Controller;

use App\Form\Note;

use App\Form\NoteFormType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

 

class TaskController extends AbstractController

{

    #[Route('/task', name: 'app_task')]

 

    /**

     * @Route("/note",name="note")

     * @param Request $request

     * @return Response

     */

 

     public function index(Request $request): Response

 

     {

 

         $note=new Note();

 

         $noteForm= $this->createForm(NoteFormType::class,$note);

 

         $noteForm->handleRequest($request);

 

         if($noteForm->isSubmitted() && $noteForm->isValid()){

 

             $data=$noteForm->getData();

 

             $message=$data->message;

 

             $created=$data->created->format('Y-m-d h:i:s');

 

             $gender=$data->gender;

 

             return $this->render('success/index.html.twig',

 

             ['message'=>$message,'created'=>$created,'gender'=>$gender]);

 

         }

 

         return $this->render('task/index.html.twig',

         ['note_form' => $noteForm -> createView()

 

         ]);

 

     }

 

}