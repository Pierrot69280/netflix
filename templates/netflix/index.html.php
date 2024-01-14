<h1>Voici les films et séries Netfllix :</h1>

<hr>

<?php foreach ($netflixs as $netflix): ?>
    <div class="card mt-5">
        <div class="card-body">
            <h1 class="card-title"><?= $netflix->getName() ?></h1>
            <h4 class="card-subtitle mt-3"><?= $netflix->getDescription() ?></h4>
            <h5 class="card-subtitle mt-3"><?= $netflix->getTime()?> heures</h5>
            <a href="?type=netflix&action=show&id=<?= $netflix->getId() ?>" class="btn btn-success mt-3">Voir</a>
            <a href="?type=netflix&action=delete&id=<?= $netflix->getId() ?>" class="btn btn-danger mt-3">Supprimer</a>
            <a href="?type=netflix&action=edit&id=<?= $netflix->getId() ?>" class="btn btn-warning mt-3">Edit</a>
        </div>
    </div>


<?php endforeach; ?>