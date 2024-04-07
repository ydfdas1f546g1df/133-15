<?php
/**
 * @var eventClass[] $events
 */
require_once 'classes/eventClass.php';

//$eventsload = parse_ini_file("ini/events.ini", true);

$filePath = "json/events.json";
$fileContent = file_get_contents($filePath);
$jsonObject = json_decode($fileContent);

$events = [];

foreach ($jsonObject->events as $event) {
    $events[$event->name] = new eventClass($event->name ?? "NULL",
        $event->description ?? "NULL",
        $event->price ?? 0,
        $event->location ?? "NULL",
        $event->startdate ?? 0,
        $event->enddate ?? 0,
        $event->type ?? "NULL",
        $event->capacity ?? 0,
        $event->registrationDeadline ?? 0,
        $event->organizer ?? "NULL",
        $event->contactInformation ?? "NULL",
        $event->participants ?? []);
}
