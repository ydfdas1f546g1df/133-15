<?php
$sub = 2;
require_once '../../lib/sessionstart.php';
require_once '../../lib/requireAdmin.php';
require_once "../../lib/errorCreater.php";
require_once '../../classes/eventListClass.php';
require_once '../../classes/userListClass.php';

$events = new eventListClass();
$users = new userListClass();

if (!isset($_GET['id'])) {
    echo "No event selected";
    header('location:manageevent.php');
    exit;
}
$id = $_GET['id'];

if ($id == 'new'
) {
    $newID = $events->eventClassList[count($events->eventClassList) - 1]->id + 1;
    $events->eventClassList[] = new eventClass(" ", " ", 0, " ", 0, 0, " ", 0, 0, " ", " ", [], $newID);
    $events->write();
    $id = $newID;
}

$events->eventClassList[$id]->name = $_POST['name'] ?? $events->eventClassList[$id]->name;
$events->eventClassList[$id]->description = $_POST['description'] ?? $events->eventClassList[$id]->description;
$events->eventClassList[$id]->location = $_POST['location'] ?? $events->eventClassList[$id]->location;
if (isset($_POST['startdate'])) {
    $events->eventClassList[$id]->startdate = strtotime($_POST['startdate']) ?? $events->eventClassList[$id]->startdate;
}
if (isset($_POST['enddate'])) {
    $events->eventClassList[$id]->enddate = strtotime($_POST['enddate']) ?? $events->eventClassList[$id]->enddate;
}
if (isset($_POST['registrationEnd'])) {
    $events->eventClassList[$id]->RegistrationDeadline = strtotime($_POST['registrationEnd']) ?? $events->eventClassList[$id]->RegistrationDeadline;
}
$events->eventClassList[$id]->Type = $_POST['type'] ?? $events->eventClassList[$id]->Type;
$events->eventClassList[$id]->Capacity = $_POST['capacity'] ?? $events->eventClassList[$id]->Capacity;
$events->eventClassList[$id]->Organizer = $_POST['organizer'] ?? $events->eventClassList[$id]->Organizer;
$events->eventClassList[$id]->ContactInfo = $_POST['contact'] ?? $events->eventClassList[$id]->ContactInfo;
$events->write();

$events = new eventListClass();

?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../../css/admin/modEvent.css">

</head>
<body>
    <header>
        <a href=".. ">Back</a>
        <h1>Manage Settings</h1>
        <a href="../../logout.php">Logout</a>
    </header>
    <main>
        <h2>Settings</h2>
        <form action="./modify.php?id=<?= $_GET['id'] ?>" method="post">
            <ul class="maindata">
                <li>
                    <h3>MainData</h3>
                    <div class="grid-container">
                        <label class="grid-item" for="name">
                            Name <input name="name" type="text"
                                        value="<?= $events->eventClassList[$_GET['id']]->name ?>"/>
                        </label><br/>
                        <label class="grid-item" for="description">
                            Description <input name="description" type="text"
                                               value="<?= $events->eventClassList[$_GET['id']]->description ?>"/>
                        </label><br/>
                        <label class="grid-item" for="location">
                            Location <input name="location" type="text"
                                            value="<?= $events->eventClassList[$_GET['id']]->location ?>"/>
                        </label><br/>
                        <label class="grid-item" for="startdate">
                            Start Date <input name="startdate"
                                              type="datetime-local"
                                              value="<?= date('Y-m-d\TH:i', $events->eventClassList[$_GET['id']]->startdate) ?>"/>
                        </label><br/>
                        <label class="grid-item" for="enddate">
                            End Date <input name="enddate" type="datetime-local"
                                            value="<?= date('Y-m-d\TH:i', $events->eventClassList[$_GET['id']]->enddate) ?>"/>
                        </label><br/>
                        <label class="grid-item" for="registrationEnd">
                            Registration End <input name="registrationEnd"
                                                    type="datetime-local"
                                                    value="<?= date('Y-m-d\TH:i', $events->eventClassList[$_GET['id']]->RegistrationDeadline) ?>"/>
                        </label><br/>
                        <label class="grid-item" for="type">
                            Type <input name="type" type="text"
                                        value="<?= $events->eventClassList[$_GET['id']]->Type ?>"/>
                        </label><br/>
                        <label class="grid-item" for="maxParticipants">Max Participants <input name="capacity"
                                                                                               type="number"
                                                                                               value="<?= $events->eventClassList[$_GET['id']]->Capacity ?>"/>
                        </label><br/>
                    </div>
                </li>
                <li>
                    <h3>Organizer</h3>
                    <div class="grid-container">
                        <label class="grid-item" for="organizer">
                            Organizer <input name="organizer" type="text"
                                             value="<?= $events->eventClassList[$_GET['id']]->Organizer ?>"/>
                        </label><br/>
                        <label class="grid-item" for="Contact">
                            Organizer Contact <input class="grid-item" name="contact" type="text"
                                                     value="<?= $events->eventClassList[$_GET['id']]->ContactInfo ?>"/>
                        </label>
                    </div>
                </li>
                <li>
                    <input type="submit" value="Save"/>
                    <button onClick="event.preventDefault();window.location.reload();">Reload Page / Cancel</button>
                    <button onClick="event.preventDefault();console.log('Form submission prevented. Redirecting now.');window.location.href = './manageevent.php';">
                        Back
                    </button>

                </li>
            </ul>
        </form>
    </main>
</body>
</html>
