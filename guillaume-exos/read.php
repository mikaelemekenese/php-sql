<?php
include 'functions_custom.php';

$pdo = pdo_connect_mysql();

$pdo_stmt = $pdo->prepare('SELECT * FROM students');
$pdo_stmt->execute();

$students = $pdo_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php echo template_header('Read'); ?>

<div class="content read">

	<div><h2>Students List</h2> 
    <span><a href="create.php" class="add"><i class="fas fa-plus-square fa-xs"></i></a></span></div>

	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Phone Number</td>
                <td>Age</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo $student["id"]?></td>
                <td><?php echo $student["first_name"]?></td>
                <td><?php echo $student["last_name"]?></td>
                <td><?php echo $student["email"]?></td>
                <td><?php echo chunk_split($student["phone"],2,"&nbsp;")?></td>
                <td><?php echo $student["age"]?></td>
                <td class="actions">
                    <a href="update.php?id=<?php echo $student["id"]?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?php echo $student["id"]?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>

    </table>
</div>

<?php echo template_footer(); ?>