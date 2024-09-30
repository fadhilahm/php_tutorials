<?php require('partials/head.php')  ?>
<?php require('partials/nav.php')  ?>
<?php require('partials/banner.php')  ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <?php
        echo "<div class='flex gap-x-2 py-2 px-4'>";
        foreach ($posts as $post) {
            echo "
            <div class='flex rounded shadow-lg max-w-sm flex-col bg-blue-100 py-2 px-4'>
                <p class='text-gray-500 font-semibold text-xl'>{$post['title']}</p>
                <p class='text-gray-500'>{$post['content']}</p>
            </div>
            ";
        }
        echo "</div>";
        ?>
    </div>
</main>

<?php require('partials/footer.php')  ?>
