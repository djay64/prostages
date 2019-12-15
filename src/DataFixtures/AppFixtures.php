<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Entreprise;
use App\Entity\Stage;
use App\Entity\Formation;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         // création d'un générateur de données faker.
		 $faker = \Faker\Factory::create('fr_FR');
		 
		 // création des formations
		
		 $dutInfo = new Formation();
		 $dutInfo -> setNomCourt("DUT Info");
         $dutInfo -> setNomLong("DUT Informatique");
		
        $duTic = new Formation();
        $duTic -> setNomLong("Diplôme universitaire en Technologies de l'Information et de la Communication");
		$duTic-> setNomCourt("DU TIC");
		
		$licenceProMultimédia = new Formation();
		 $licenceProMultimédia -> setNomCourt("LP Multimédia");
         $licenceProMultimédia -> setNomLong("Licence professionelle multimédia");
		
// mise en persistance des objets formations
       $tableauFormations = array($dutInfo,$duTic,$licenceProMultimédia);
        foreach ($tableauFormations as $uneFormation){
            $manager->persist($uneFormation);
				}

        // création des entreprises
		
		 $tableauEntreprise=array();
        for($i=1;$i<=15;$i++){
            $entreprise = new Entreprise();
            $entreprise -> setNom($faker->company());
			$entreprise -> setAdresse($faker->address());			
            $entreprise -> setActivité ("Développement web") ;             
            $entreprise -> setSiteWebEntreprise($faker->url());
            array_push($tableauEntreprise,$entreprise); 
		$manager->persist($entreprise);
		}
		
		// création des stages et liens
		
		for($i=1;$i<=30;$i++){
            $stage = new Stage();
            $stage -> setTitre($faker->catchPhrase());
            $stage -> setDescription($faker->realText($maxNbChars = 255, $indexSize = 2));
			$stage -> setDateDebut($faker->dateTimeBetween($startDate = 'now', $endDate = '+ 1years', $timezone = null, $format = 'd-m-Y'));
            $stage -> setDateFin($faker->dateTimeBetween($startDate = $stage->getDateDebut(), $endDate = '+ 1years', $timezone = null, $format = 'd-m-Y'));
			$stage -> setDateAjout($faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now', $timezone = null, $format = 'd-m-Y'));
			$stage -> setEmailContact($faker->email());
            
                       
            $ent=$faker->randomElement($array = $tableauEntreprise);
			$stage -> setEntreprise($ent);
			$ent -> addStage($stage);
			
			$nbFormation=$faker->numberBetween($min = 1, $max = 3);
            for($j=1; $j<=$nbFormation; $j++ ){
                $stage -> addFormation($tableauFormations[$j-1]);
                $tableauFormations[$j-1]->addStage($stage);
                $manager->persist($tableauFormations[$j-1]);
            }
		
		    $manager->persist($stage);
            $manager->persist($ent);
				
		}
		
			
		// envoyer les données en BD
		 $manager->flush();
    }
}
