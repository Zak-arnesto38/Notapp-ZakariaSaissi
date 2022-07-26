<?php
include("includes/header.php");
include("database/function.php");
$errors = [];
$message = "";
if(isset($_POST['submit'])):
$nom = htmlentities(trim($_POST['nom']));
$prenom = htmlentities(trim($_POST['prenom']));
$age = htmlentities(trim($_POST['age']));
$service = htmlentities(trim($_POST['service']));
$matricule = htmlentities(trim($_POST['matricule']));
        if(empty($nom)):
            $errors = 'you need to write youre name';
        elseif(empty($prenom)):
            $errors = 'you need to write youre prenom';        
        elseif(empty($age)):
            $errors = 'you need to write youre age';
        elseif(empty($service)):
            $errors = 'you need to write youre service';
        elseif(empty($matricule)):
            $errors = 'you need to write youre matricule';
        else: 
                $values = array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'age' => $age,
                    'service' => $service,
                    'matricule' => $matricule,
                );
                if (emp_insert($con,$values === true)):
                    $message = '<div class="alert alert-danger">add avec success</div>';
                else: 
                    $message = '<div class="alert alert-danger">you have one erreur</div>';
                endif;
            endif;
endif;
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-4">
            <div class="card">
            <h1 class="card-title text-info pt-2 px-3 text-center mb-0">add youre Employe</h1>
            <hr>
            <?php
            if(!empty($errors)):
                echo '<div class="alert alert-danger">'.$errors.'</div>';
            else:
                echo $message;
            endif;
            ?>
            <div class="card-body">
            <div class="form-group">        
             <form action="add.php" method="post">
                        <div class="form-group">
                            <label for="nom">Nom*</label>
                            <input type="text" class="form-control" placeholder="Nom" name="nom"  id="nom" value="<?php echo isset($_POST['nom']) ? $_POST['nom'] : '' ; ?>">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom*</label>
                            <input type="text" class="form-control" placeholder="prenom" name="prenom"  id="prenom"  value="<?php echo isset($_POST['prenom']) ? $_POST['prenom'] : '' ; ?>">
                        </div>
                        <div class="form-group">
                            <label for="age">age<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" placeholder="age" name="age"  id="age"  value="<?php echo isset($_POST['age']) ? $_POST['age'] : '' ; ?>">
                        </div>
                             <div class="form-group">
                            <label for="service">Service<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="service" name="service"  id="service"  value="<?php echo isset($_POST['service']) ? $_POST['service'] : '' ; ?>">
                        </div>
                            <div class="form-group">
                            <label for="matricule">Matricule<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="matricule" name="matricule"  id="matricule"  value="<?php echo isset($_POST['matricule']) ? $_POST['matricule'] : '' ; ?>">
                        </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" name="submit">Ajoutè</button>
            </div>
              </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("includes/footer.php");
?>