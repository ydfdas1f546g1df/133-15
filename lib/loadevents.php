<?php
/**
 * @var eventClass[] $events
 */
require_once 'classes/eventClass.php';
$eventsload = parse_ini_file("ini/events.ini", true);

$events = [];

foreach ($eventsload as $event) {
    $events[$event['name']] = new eventClass($event['name'] ?? "NULL",
        $event['description'] ?? "NULL",
        $event['price'] ?? 0,
        $event['location'] ?? "NULL",
        $event['startdate'] ?? 0,
        $event['enddate'] ?? 0,
        $event['Type'] ?? "NULL",
        $event['Capacity'] ?? 0,
        $event['RegistrationDeadline'] ?? 0,
        $event['Organizer'] ?? "NULL",
        $event['ContactInformation'] ?? "NULL",
        $event['Teilnehmer'] ?? []);
}
