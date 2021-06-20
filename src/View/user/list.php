<?php
include __DIR__ . "/../header.php";
?>

<table>
    <thead>
        <tr>
            <th>User name</th>
        </tr>
    </thead>
    <tbody>
<?php
/** @var \App\Model\User $user */
foreach ($users as $user) {
    ?>
    <tr>
        <td><?= $user->getName(); ?></td>
    </tr>
    <?php
}
?>
    </tbody>
</table>

<?php
include __DIR__ . "/../footer.php";
