<?php

namespace App\DataFixtures;

use App\Entity\Accord;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

	
class AccordFixtures extends Fixture implements DependentFixtureInterface 
{

    public function load(ObjectManager $manager)
    {
    	$notes = [
                 'Do'   => ['Do', 'Mi', 'Sol'],
                 'Do#'  => ['Do#', 'Mi#', 'Sol#'],
                 'Re'   => ['Re', 'Fa#', 'La'],
                 'Re#'  => ['Re#', 'Sol', 'La#'],
                 'Mi'   => ['Mi', 'Sol#', 'Si'],
                 'Fa'   => ['Fa', 'La', 'Do'],
                 'Fa#'  => ['Fa#', 'La#', 'Do#' ],
                 'Sol'  => ['Sol', 'Si', 'Re'],
                 'Sol#' => ['Sol#', 'Si#', 'Re#'],
                 'La'   => ['La', 'Do', 'Mi'],
                 'La#'  => ['La#', 'Re', 'Mi#'],
                 'Si'   => ['Si', 'Re#', 'Fa#'],
                 ];
   
   	 	foreach ($notes as $noteName => $value) {
    		$accord = New Accord();
    		$accord->setName($noteName);
            $accord->setMode('Majeur');
            foreach ($value as $note) {
                $accord->addNote($this->getReference($note));
            }
    		$manager->persist($accord);
   	        $manager->flush();
    	}
    }

    public function getDependencies()
    {
    return [NoteFixtures::class];
    }
}
