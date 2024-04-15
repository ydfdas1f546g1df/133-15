<?php

class eventClass
{
    public int $id;
    public string $name;
    public string $description;
    public float $price;
    public string $location;
    public int $startdate;
    public int $enddate;
    public string $Type;
    public int $Capacity;
    public int $RegistrationDeadline;
    public string $Organizer;
    public string $ContactInfo;
    public array $Teilnehmer;

    public function __construct(string $name,
                                string $description,
                                float $price, string
                                $location, int $startdate,
                                int $enddate, string $Type,
                                int $Capacity, int $RegistrationDeadline,
                                string $Organizer,
                                string $ContactInfo,
                                array $Teilnehmer,
                                int $id)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->location = $location;
        $this->startdate = $startdate;
        $this->enddate = $enddate;
        $this->Type = $Type;
        $this->Capacity = $Capacity;
        $this->RegistrationDeadline = $RegistrationDeadline;
        $this->Organizer = $Organizer;
        $this->ContactInfo = $ContactInfo;
        $this->Teilnehmer = $Teilnehmer;
        $this->id = $id;
    }


}