<?php
if (!isset($sub)) {
    $sub = 0;
}
$path = str_repeat("../", $sub);
require_once $path.'classes/eventClass.php';

class eventListClass
{
    /** @var eventClass[] */
    public array $eventClassList = [];

    public function __construct($filePath = "json/events.json")
    {
        $filePath = $GLOBALS['path'] . $filePath;
        $jsonObjectRaw = json_decode(file_get_contents($filePath));
        foreach ($jsonObjectRaw->events as $event) {
            $this->eventClassList[$event->id] = new eventClass(
                $event->name ?? "NULL",
                $event->description ?? "NULL",
                $event->price ?? 0,
                $event->location ?? "NULL",
                $event->startdate ?? 0,
                $event->enddate ?? 0,
                $event->type ?? "NULL",
                $event->capacity ?? 0,
                $event->registrationDeadline ?? 0,
                $event->organizer ?? "NULL",
                $event->contact ?? "NULL",
                $event->participants ?? [],
                $event->id ?? 0
            );
        }
    }

    function write($filePath = "json/events.json"): void
    {
        $filePath = $GLOBALS['path'] . $filePath;
        $eventsArray = ['events' => []];
        foreach ($this->eventClassList as $eventObj) {
            $eventsArray['events'][] = [
                'id' => $eventObj->id,
                'name' => $eventObj->name,
                'description' => $eventObj->description,
                'price' => $eventObj->price,
                'location' => $eventObj->location,
                'startdate' => $eventObj->startdate,
                'enddate' => $eventObj->enddate,
                'type' => $eventObj->Type,
                'capacity' => $eventObj->Capacity,
                'registrationDeadline' => $eventObj->RegistrationDeadline,
                'organizer' => $eventObj->Organizer,
                'contact' => $eventObj->ContactInfo,  // Use 'contact' here
                'participants' => $eventObj->Teilnehmer
            ];
        }

//        echo "<pre>";
//        print_r(json_encode($eventsArray, JSON_PRETTY_PRINT));
//        echo "</pre>";
        file_put_contents($filePath, json_encode($eventsArray, JSON_PRETTY_PRINT));

    }
}