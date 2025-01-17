<?php require(base_path('views/partials/head.php'))  ?>
<?php require(base_path('views/partials/nav.php'))  ?>
<?php require(base_path('views/partials/banner.php'))  ?>

<main>
    <div class="mx-auto max-w-2xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/notes" class="bg-white shadow-md rounded-lg p-6 space-y-6">
            <div class="space-y-2">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-300 focus:ring focus:ring-amber-200 focus:ring-opacity-50 <?= isset($errors['title']) ? 'border-red-500' : '' ?>"
                    placeholder="Enter your note title..."
                    value="<?= $_POST['title'] ?? '' ?>"
                >
                <?php if (isset($errors['title'])) : ?>
                    <p class="text-red-500 text-sm mt-1"><?= $errors['title'] ?></p>
                <?php endif; ?>
            </div>

            <div class="space-y-2">
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea 
                    name="content" 
                    id="content"
                    rows="6"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-300 focus:ring focus:ring-amber-200 focus:ring-opacity-50 <?= isset($errors['content']) ? 'border-red-500' : '' ?>"
                    placeholder="Write your note content here..."
                ><?= $_POST['content'] ?? '' ?></textarea>
                <?php if (isset($errors['content'])) : ?>
                    <p class="text-red-500 text-sm mt-1"><?= $errors['content'] ?></p>
                <?php endif; ?>
            </div>

            <div class="flex justify-end space-x-4">
                <a 
                    href="/notes" 
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500"
                >
                    Cancel
                </a>
                <button 
                    type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-amber-400 hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500"
                >
                    Create Note
                </button>
            </div>
        </form>
    </div>
</main>

<?php require(base_path('views/partials/footer.php'))  ?>
