<?php
include __DIR__ . "/../header.php";
?>

<?php
/** @var \App\Model\Advertisement $advertisement */
foreach ($advertisements as $advertisement) {
    echo $advertisement->getTitle();
}
?>

<?php
include __DIR__ . "/../footer.php";
