<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Films</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/home.css" />
</head>
<body>
<div class="container">
    <div class="row">
        <!-- Lista de películas -->
        <div class="col-md-4">
            <h3>Lista de Películas</h3>
            <ul class="list-group">
                <?php foreach ($films as $film): ?>
                    <li class="list-group-item film" data-id="<?= htmlspecialchars($film->getId()); ?>">
                        <?= htmlspecialchars($film->getTitle()); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Detalles de la película -->
        <div class="col-md-8">
            <h3>Detalles de la Película</h3>
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">ID:</label>
                    <div class="col-sm-10">
                        <input id="id" name="id" type="text" class="form-control" placeholder="ID" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rating" class="col-sm-2 control-label">Puntuación:</label>
                    <div class="col-sm-10">
                        <input id="rating" name="rating" type="number" class="form-control" placeholder="Puntuación" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Título:</label>
                    <div class="col-sm-10">
                        <input id="title" name="title" type="text" class="form-control" placeholder="Título" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="year" class="col-sm-2 control-label">Año:</label>
                    <div class="col-sm-10">
                        <input id="year" name="year" type="number" class="form-control" placeholder="Año" disabled>
                    </div>
                </div>
            </form>
            <div class="form-group">
                <label for="image" class="col-sm-2 control-label">Carátula:</label>
                <div class="col-sm-10">
                    <img id="image" src="https://imprentamadrid.com/wp-content/uploads/2019/08/CARATULA_DVD-scaled.jpg" alt="carátula genérica" class="img-responsive img-thumbnail">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- Custom JS -->
<script src="js/home.js"></script>
</body>
</html>