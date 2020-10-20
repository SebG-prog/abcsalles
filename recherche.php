<?php
var_dump($_POST);
if ($_POST) {
    if (isset($_POST['label']) && !empty($_POST['label'])) {
        try { 
            require_once('connection.php');
            $label = strip_tags($_POST['label']);
    
            $sql = 'SELECT * FROM `ref_prenoms` WHERE label LIKE :label'.'% ORDER BY label ASC;';
            $query = $db->prepare($sql);
    
            $query->bindValue('label', $label, PDO::PARAM_STR);
            $query->execute(); 
    
            $persons = $query->fetchAll();
            var_dump($persons);
    
            require_once('close.php');
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        
    } else {

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
            <h1>Rechercher une personne</h1>
            <form method="post">
                <div class="form-group">
                    <label for="label">Prenom: </label>
                    <input type="text" name="label" id="label" class="form-control" />
                </div>
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </form>
            </section>
        </div>
        <a href="index.php">Retour</a>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>