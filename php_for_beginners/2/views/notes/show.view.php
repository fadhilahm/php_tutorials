<?php require(base_path('views/partials/head.php'))  ?>
<?php require(base_path('views/partials/nav.php'))  ?>
<?php require(base_path('views/partials/banner.php'))  ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex-row flex flex-wrap gap-x-4 gap-y-6">
        <?php
            $item = $note;
            require(base_path('views/components/postit.php'));
        ?>
    </div>
</main>

<?php require(base_path('views/partials/footer.php'))  ?>
