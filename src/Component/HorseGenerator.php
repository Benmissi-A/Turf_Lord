<?php
namespace App\Component;
use App\Entity\Horse;
use App\Component\NameGenerator;
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
           // $horse->setRacesCount(0);

            //$performance = rand(1,50);
            $horsesList[]=$horse;
        }
        return $horsesList;
    }
}