<?php

namespace App\Entity;

use App\Repository\CarpoolingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Enum\StatutType;

#[ORM\Entity(repositoryClass: CarpoolingRepository::class)]
class Carpooling
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $departure_date = null;

    #[ORM\Column(length: 255)]
    private ?string $place_of_departure = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $arrival_date = null;

    #[ORM\Column(length: 255)]
    private ?string $place_of_arrival = null;

    #[ORM\Column]
    private ?int $number_of_place = null;

    #[ORM\Column]
    private ?float $person_price = null;

    #[ORM\Column(type: "string", enumType: StatutType::class)]
    private StatutType $statut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartureDate(): ?\DateTimeInterface
    {
        return $this->departure_date;
    }

    public function setDepartureDate(\DateTimeInterface $departure_date): static
    {
        $this->departure_date = $departure_date;

        return $this;
    }

    public function getPlaceOfDeparture(): ?string
    {
        return $this->place_of_departure;
    }

    public function setPlaceOfDeparture(string $place_of_departure): static
    {
        $this->place_of_departure = $place_of_departure;

        return $this;
    }

    public function getArrivalDate(): ?\DateTimeInterface
    {
        return $this->arrival_date;
    }

    public function setArrivalDate(\DateTimeInterface $arrival_date): static
    {
        $this->arrival_date = $arrival_date;

        return $this;
    }

    public function getPlaceOfArrival(): ?string
    {
        return $this->place_of_arrival;
    }

    public function setPlaceOfArrival(string $place_of_arrival): static
    {
        $this->place_of_arrival = $place_of_arrival;

        return $this;
    }

    public function getNumberOfPlace(): ?int
    {
        return $this->number_of_place;
    }

    public function setNumberOfPlace(int $number_of_place): static
    {
        $this->number_of_place = $number_of_place;

        return $this;
    }

    public function getPersonPrice(): ?float
    {
        return $this->person_price;
    }

    public function setPersonPrice(float $person_price): static
    {
        $this->person_price = $person_price;

        return $this;
    }


    public function getStatut(): StatutType
    {
        return StatutType::from($this->statut);
    }

    public function setStatut(StatutType $statut): self
    {
        $this->statut = $statut->value;
        return $this;
    }
}
