<?php

require_once '../lib/include.php';

$confId = (int)$_GET['id'];

$conference = $confService->findConference($confId);
$sessions = $sessionService->findSessions($confId);

require_once '../lib/header.php';

?>
<div class="wrapper">
<h1>PHPCon</h1>
<h2><?php echo $conference->getName() ?></h2>
<?php if(empty($sessions)): ?>

<p>There are no sessions for this conference.</p>
    

<?php else: ?>

    <table class="sessions conferences">

        <thead>
            <tr>
                <th>Name</th>
                <th>Speaker</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($sessions as $session): ?>
            <tr>
                <td><?php echo $session->getName() ?></td>
                <td><?php echo $session->getSpeaker() ?></td>
                <td><?php echo $session->getTime()->format('H:i') ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>

<?php endif; ?>

<?php require_once '../lib/footer.php'; ?>