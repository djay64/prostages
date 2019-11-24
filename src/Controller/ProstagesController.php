<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;  // permet de pouvoir faire des annotations
use Symfony\Component\HttpFoundation\Response; // pour pouvoir utiliser reponse

class ProstagesController extends AbstractController
{/**
     * @Route("/", name="prostages_accueil")
     */	
     public function index()
    {
        return $this->render('prostages/index.html.twig');
               }
	 /**
     * @Route("/entreprises", name="prostages_entreprises")
     */	 
	public function entreprises()
    {
		return $this->render('prostages/entreprises.html.twig') ;
    }
	
	  /**
     * @Route("/formations", name="prostages_formations")
     */	 
	 public function formations()
    {
		return $this->render("prostages/formations.html.twig");    }
	
	/**
     * @Route("/stages/{id}", name="prostages_stagesId")
     */	
	public function stages($id)
    {
		return $this->render("prostages/stages.html.twig", ['idStage'=>$id]);
    }
			 }
