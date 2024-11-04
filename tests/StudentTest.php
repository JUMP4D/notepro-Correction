<?php

namespace App\Tests;

use App\Entity\Evaluation;
use App\Entity\Grade;
use App\Entity\Student;
use PHPUnit\Framework\TestCase;

class StudentTest extends TestCase
{
    public function testgetAverageNote()
    {

        // 3 notes

        // Création d'un étudiant
        $student = new Student();
        // Création d'une évaluation
        $evaluation = new Evaluation();
        // Attribution d'un barème à l'évaluation
        $evaluation->setBareme(20);
        // Création de deux notes pour l'étudiant
        $grade1 = new Grade();
        $grade1->setGrade(20);
        $grade1->setEvaluation($evaluation);
        $grade2 = new Grade();
        $grade2->setGrade(15);
        $grade2->setEvaluation($evaluation);
        // Ajout des notes à l'étudiant
        $student->addGrade($grade1);
        $student->addGrade($grade2);
        // Vérification de la moyenne des notes
        $this->assertEquals(17.5, $student->getAverageNote());

        // 1 notes

        $student2 = new Student();
        $evaluation2 = new Evaluation();
        $evaluation2->setBareme(20);
        $grade3 = new Grade();
        $grade3->setGrade(10);
        $grade3->setEvaluation($evaluation2);
        $student2->addGrade($grade3);

        $this->assertEquals(10, $student2->getAverageNote());

        // pas de notes

        $student3 = new Student();

        $this->assertEquals(0, $student3->getAverageNote());
    }
}
