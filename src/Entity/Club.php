<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Club
{
 
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $ref = null;

    #[ORM\OneToMany(mappedBy: 'club', targetEntity: Student::class)]
    private Collection $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

   
    public function getRef(): ?int
    {
        return $this->ref;
    }

    public function setRef(int $ref): static
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): static
    {
        if (!$this->students->contains($student)) {
            $this->students->add($student);
            $student->setClub($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): static
    {
        if ($this->students->removeElement($student)) {
            // set the owning side to null (unless already changed)
            if ($student->getClub() === $this) {
                $student->setClub(null);
            }
        }

        return $this;
    }
}
