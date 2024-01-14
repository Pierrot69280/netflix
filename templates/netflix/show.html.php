<div class="card">
    <div class="card-body">
        <h1 class="card-title"><?= $netflix->getName() ?></h1>
        <h4 class="card-subtitle mt-3"><?= $netflix->getDescription() ?></h4>
        <h5 class="card-subtitle mt-3"><?= $netflix->getTime()?> heures</h5>
        <a href="?type=netflix&action=index" class="btn btn-outline-secondary mt-3">Retour</a>
    </div>
</div>