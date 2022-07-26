<?php
include("includes/header.php");
include("database/function.php");
$result = emp_get($con);

?>
<div class="container">
    
    <div class="row">
        <div class="col-md-8 mx-auto mt-4">

            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Age</th>
                            <th>Service</th>
                            <th>Matricule</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                        <td><?php echo $row ['nom'];?></td>
                        <td><?php echo $row ['prenom'];?></td>
                        <td><?php echo $row ['age'];?></td>
                        <td><?php echo $row ['service'];?></td>
                        <td><?php echo $row ['matricule'];?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row ['id'];?>" class="btn btn-danger btn-xs">Edit</a>
                            <a href="delete.php?id=<?php echo $row ['id'];?>" class="btn btn-warning btn-xs">Delete</a>
                        </td>
                        </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                    <a href="add.php" class="btn btn-primary">ajoutè</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("includes/footer.php");
?>