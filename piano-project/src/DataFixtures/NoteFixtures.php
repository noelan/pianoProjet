<?php

namespace App\DataFixtures;

use App\Entity\Note;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

	
class NoteFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
    	$notes = ['Do', 'Do#', 'Re', 'Re#', 'Mi', 'Mi#', 'Fa', 'Fa#', 'Sol', 'Sol#', 'La' , 'La#', 'Si',     'Si#'];
   
   	 	foreach ($notes as $noteName) {
    		$note = New Note();
    		$note->setName($noteName);

    		$this->addReference($noteName, $note);

    		$manager->persist($note);
   	        $manager->flush();
    	}
    }
}
