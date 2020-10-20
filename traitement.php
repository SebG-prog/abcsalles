<?php
if ($_POST) {
    if (isset($_POST['filename']) && !empty($_POST['filename'])) {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $_POST['filename'] . '.csv';
        $ressource = fopen($file, 'r');

        $k=0; // For testing
        while($line = fgets($ressource)) {
            if ($k >= 1) {
                if ($k === 5) {
                    die();
                }
                $label = trim(explode(";", $line)[1], '"');
                // traitement mysql non fini...
                
                // require_once('connection.php');
                // try {
                //     $sql = 'SELECT * FROM `ref_prenoms` WHERE label=:label ;';
                    
                //     $query = $db->prepare($sql);
                //     $query->bindValue('label', $label, PDO::PARAM_STR);
                //     $query->execute();
                    
                //     $person = $query->fetch();
                                       
                // } catch (PDOException $e) {
                //     echo 'Error: ' . $e->getMessage();
                // }
                
                // require_once('close.php');
            }
            $k++;
        }
        fclose($ressource);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
            <form method="post">
                <label for="filename">Choisir un fichier: </label>
                <select name="filename" id="filename">
                    <optgroup label="Select a file">
                        <option value="a-traiter">a-traiter</option>
                    </optgroup>
                </select>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
            </section>
        </div>
        <a href="index.php" class="btn btn-primary">Retour</a>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>