<?php require('partials/head.php')  ?>
<?php require('partials/nav.php')  ?>
<?php require('partials/banner.php')  ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex-row flex flex-wrap gap-x-4 gap-y-6">
        <?php foreach ($notes as $item): ?>
            <?php require('components/postit.php')  ?>
        <?php endforeach; ?>
    </div>
</main>

<?php require('partials/footer.php')  ?>
