<?php require(base_path('views/partials/head.php'))  ?>
<?php require(base_path('views/partials/nav.php'))  ?>
<?php require(base_path('views/partials/banner.php'))  ?>

<main>
    <div class="mx-auto max-w-md px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/register" class="bg-white shadow-md rounded-lg p-6 space-y-6">
            <div class="space-y-2">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-300 focus:ring focus:ring-amber-200 focus:ring-opacity-50 <?= isset($errors['name']) ? 'border-red-500' : '' ?>"
                    placeholder="Enter your name..."
                    value="<?= $_POST['name'] ?? '' ?>"
                >
                <?php if (isset($errors['name'])) : ?>
                    <p class="text-red-500 text-sm mt-1"><?= $errors['name'] ?></p>
                <?php endif; ?>
            </div>

            <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-300 focus:ring focus:ring-amber-200 focus:ring-opacity-50 <?= isset($errors['email']) ? 'border-red-500' : '' ?>"
                    placeholder="Enter your email..."
                    value="<?= $_POST['email'] ?? '' ?>"
                >
                <?php if (isset($errors['email'])) : ?>
                    <p class="text-red-500 text-sm mt-1"><?= $errors['email'] ?></p>
                <?php endif; ?>
            </div>

            <div class="space-y-2">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-300 focus:ring focus:ring-amber-200 focus:ring-opacity-50 <?= isset($errors['password']) ? 'border-red-500' : '' ?>"
                    placeholder="Enter your password..."
                >
                <?php if (isset($errors['password'])) : ?>
                    <p class="text-red-500 text-sm mt-1"><?= $errors['password'] ?></p>
                <?php endif; ?>
            </div>

            <div class="space-y-2">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    id="password_confirmation"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-300 focus:ring focus:ring-amber-200 focus:ring-opacity-50"
                    placeholder="Confirm your password..."
                >
            </div>

            <div class="flex justify-end space-x-4">
                <a 
                    href="/login" 
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500"
                >
                    Already have an account?
                </a>
                <button 
                    type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-amber-400 hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500"
                >
                    Register
                </button>
            </div>
        </form>
    </div>
</main>

<?php require(base_path('views/partials/footer.php'))  ?> 