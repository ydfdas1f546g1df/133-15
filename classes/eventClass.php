<?php

class eventClass
{
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

    public function __construct(string $name, string $description, float $price, string $location, int $startdate, int $enddate, string $Type, int $Capacity, int $RegistrationDeadline, string $Organizer, string $ContactInfo, array $Teilnehmer)
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
    }

    public function exportIniArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'location' => $this->location,
            'startdate' => $this->startdate,
            'enddate' => $this->enddate,
            'Type' => $this->Type,
            'Capacity' => $this->Capacity,
            'RegistrationDeadline' => $this->RegistrationDeadline,
            'Organizer' => $this->Organizer,
            'ContactInformation' => $this->ContactInfo,
            'Teilnehmer' => $this->Teilnehmer,
        ];
    }
}