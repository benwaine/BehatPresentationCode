<?php
require_once '../lib/include.php';
$conferences = $confService->findConferences();

require_once '../lib/header.php';

?>
<div class="wrapper">
<h1>PHPCon</h1>
<div class="conf-search">
	<label for="search-text">Search: </label>
	<input id="search-text" type="text" />
</div>
<?php if ($conferences): ?>

    <p>Here are some upcoming conferences: </p>

    <table class="conferences">

        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($conferences as $conf): ?>
            <tr>
                <td><?php echo $conf->getName() ?></td>
                <td><?php echo $conf->getDescription() ?></td>
                <td><?php echo $conf->getDate()->format('d/m/Y') ?></td>
                <td><a href="#">Info</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php else: ?>

    <p>There are currently no upcoming conferences</p>

<?php endif; ?>
</div>

<?php require_once '../lib/footer.php'; ?>



