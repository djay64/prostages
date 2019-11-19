<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;  // permet de pouvoir faire des annotations
use Symfony\Component\HttpFoundation\Response; // pour pouvoir utiliser reponse

class ProstagesController extends AbstractController
{
    /**
     * @Route("/prostages", name="prostages")
     */
    public function index()
    {
        return $this->render('prostages/index.html.twig', [
            'controller_name' => 'ProstagesController',
        ]);
    }
	
	
	
	/**
     * @Route("/", name="prostages_accueil")
     */
    public function index2()
    {
        return new Response('<html><body><h1>Bienvenue sur la page d\'accueil de Prostages</h1></body></html>') ;
	 }
	
	 /**
     * @Route("/entreprises", name="prostages_entreprises")
     */	 
	 public function entreprises()
    {
       return new Response('<html><body><h1>Cette page affichera la liste des entreprises proposant un stage</h1></body></html>') ;
    }
	
	  /**
     * @Route("/formations", name="prostages_formations")
     */	 
	 public function formations()
    {
       return new Response('<html><body><h1>Cette page affichera la liste des formations de l\'IUT</h1></body></html>')  ;
    }
	
	
	

	
	/**
     * @Route("/stages/{id}", name="prostages_stagesId")
     */	 
	 public function stages($id)
    {
       return new Response('Cette page affichera le descriptif du stage ayant pour identifiant $id') ;
    }
		
	 
}
