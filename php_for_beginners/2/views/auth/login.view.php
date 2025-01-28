<?php require(base_path('views/partials/head.php'))  ?>
<?php require(base_path('views/partials/nav.php'))  ?>
<?php require(base_path('views/partials/banner.php'))  ?>

<main>
    <div class="mx-auto max-w-md px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/login" class="bg-white shadow-md rounded-lg p-6 space-y-6">
            <?php if (isset($error)) : ?>
                <div class="bg-red-50 border-l-4 border-red-400 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700"><?= $error ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-300 focus:ring focus:ring-amber-200 focus:ring-opacity-50"
                    placeholder="Enter your email..."
                    value="<?= $_POST['email'] ?? '' ?>"
                >
            </div>

            <div class="space-y-2">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-300 focus:ring focus:ring-amber-200 focus:ring-opacity-50"
                    placeholder="Enter your password..."
                >
            </div>

            <div class="flex justify-end space-x-4">
                <a 
                    href="/register" 
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500"
                >
                    Need an account?
                </a>
                <button 
                    type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-amber-400 hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500"
                >
                    Login
                </button>
            </div>
        </form>
    </div>
</main>

<?php require(base_path('views/partials/footer.php'))  ?> 