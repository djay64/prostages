<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;  // permet de pouvoir faire des annotations
use Symfony\Component\HttpFoundation\Response; // pour pouvoir utiliser reponse

use App\Entity\Stage ; 
use App\Entity\Entreprise ;
use App\Entity\Formation ;

class ProstagesController extends AbstractController
{/**
     * @Route("/", name="prostages_accueil")
     */	
     public function index()
    {
		// recuperer le repository de l'entité stage		
		 $repositoryStage = $this->getDoctrine()->getRepository(Stage::class) ;		
		// recuperer les stages enregistrés en bd
		 $stages = $repositoryStage->findAll() ;		
		//envoyer les stages recupérés à la vue chargée de les afficher
		   return $this->render('prostages/index.html.twig',['stages'=>$stages]);
               }
			   
			   
	
	 /**
     * @Route("/entreprises", name="prostages_entreprises")
     */	 
	 
	public function entreprises()
    {
		  // recuperer le repository de l'entité entreprise		
		 $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class) ;
		// recuperer les entreprises proposant un stage		
$entreprises = $repositoryEntreprise->findAll () ;
//envoyer les stages recupérés à la vue chargée de les afficher
		   		return $this->render('prostages/entreprises.html.twig',['entreprises'=>$entreprises] ) ;
			
			
    }
	
	
	
	
	
	/**
     * @Route("/entreprises/{id}", name="listeStagesParEntreprise")
     */	 
	 
	 public function listeStagesParEntreprise($id)
	 {
		 // recuperer le repository de l'entité stage		
		 $repositoryStage = $this->getDoctrine()->getRepository(Stage::class) ;
		 
		 // recuperer les stages proposés par l'entreprise de valeur id
$stagesEnt = $repositoryStage->findByEntreprise($id) ;
//envoyer les stages recupérés à la vue chargée de les afficher

	 return $this->render('prostages/listeStages.html.twig',['listeStages'=>$stagesEnt] ) ;
	 	 
	 }
	 
	 
	 /**
     * @Route("/formations/{id}", name="listeStagesParFormation")
     */	 
	 
	 public function listeStagesParFormation($id)
	 {
		 // recuperer le repository de l'entité stage		
		 $repositoryStage = $this->getDoctrine()->getRepository(Stage::class) ;
		 
		 // recuperer les stages pour une formation de valeur id
$stagesFormation = $repositoryStage->findByFormations($id) ;
//envoyer les stages recupérés à la vue chargée de les afficher

	 return $this->render('prostages/listeStagesFormation.html.twig',['listeStages'=>$stagesFormation] ) ;
	  
	 
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
			  // recuperer le repository de l'entité stage		
		 $repositoryStage = $this->getDoctrine()->getRepository(Stage::class) ;
				// recuperer le stages correspondant à l'id enregistrés en bd
		 $stage = $repositoryStage->find($id) ;
		 		 //envoyer le stage recupéré à la vue chargée de les afficher
		   	return $this->render("prostages/stages.html.twig", ['stage'=>$stage]);
    }
			 }

