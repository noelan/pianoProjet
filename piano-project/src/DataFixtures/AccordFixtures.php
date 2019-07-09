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
                 'Do#'  => ['Do#', 'Fa', 'Sol#'],
                 'Re'   => ['Re', 'Fa#', 'La'],
                 'Re#'  => ['Re#', 'Sol', 'La#'],
                 'Mi'   => ['Mi', 'Sol#', 'Si'],
                 'Fa'   => ['Fa', 'Do', 'La'],
                 'Fa#'  => ['Fa#', 'La#', 'Do#' ],
                 'Sol'  => ['Sol', 'Si', 'Re'],
                 'Sol#' => ['Sol#', 'Do', 'Re#'],
                 'La'   => ['La', 'Do#', 'Mi'],
                 'La#'  => ['La#', 'Re', 'Fa'],
                 'Si'   => ['Si', 'Re#', 'Fa#'],
                 ];
   
   	 	foreach ($notes as $noteName => $value) {
    		$accord = New Accord();
    		$accord->setName($noteName);
            $accord->setMode('Majeur');
            $accord->setFondamental($noteName);
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
