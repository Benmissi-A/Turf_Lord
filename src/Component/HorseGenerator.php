<?php
namespace App\Component;
use App\Entity\Horse;
use App\Component\NameGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\Uuid;

class HorseGenerator {

    /**
     * @param int $maxContenders
     * @return array*
     */
    static Function generateHorses(int $maxContenders = 10) :array
    {
        for($i = 0; $i < $maxContenders; $i++)
        {
            $horse = new Horse();
            $horse->setName(NameGenerator::generateName());
            $horse->setUuid(Uuid::uuid4()->toString());
            $horse->setScore(ScoreGenerator::generateScore());
            $horsesList[]=$horse;
        }
        return $horsesList;
    }

    /**
     * @param int $maxContenders
     * @return array*
     */
    static Function selectRandomHorses(EntityManagerInterface $em,int $maxContenders = 10) :array
    {
        $horses=$em->getRepository(Horse::class)->findAll();

        shuffle($horses);
        //dd($horses);
        for($i = 0; $i < $maxContenders; $i++)
        {
            $horses[$i]->setScore(ScoreGenerator::generateScore());
            $horsesList[$i]=$horses[$i];
        }
        //dd($horsesList);


        return $horsesList;
    }
}