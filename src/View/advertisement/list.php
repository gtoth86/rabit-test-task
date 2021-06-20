<?php
include __DIR__ . "/../header.php";
?>

<table>
    <thead>
        <tr>
            <th>Advertisement title</th>
            <th>User name</th>
        </tr>
    </thead>
    <tbody>
<?php
/** @var \App\Model\Advertisement $advertisement */
foreach ($advertisements as $advertisement) {
    ?>
        <tr>
            <td><?= $advertisement->getTitle(); ?></td>
            <td><?= $advertisement->getUser()->getName() ?></td>
        </tr>
    <?php
}
?>
    </tbody>
</table>

<?php
include __DIR__ . "/../footer.php";
