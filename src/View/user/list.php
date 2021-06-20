<?php
include __DIR__ . "/../header.php";
?>

<?php
/** @var \App\Model\User $user */
foreach ($users as $user) {
    echo $user->getName();
}
?>

<?php
include __DIR__ . "/../footer.php";
