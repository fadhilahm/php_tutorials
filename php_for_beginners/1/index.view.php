<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorial</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 1rem;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: lightblue;
            flex-direction: column;
        }
    </style>
</head>

<body class="flex gap-y-4">
    <h1 class="font-bold text-xl">Recommended Books</h1>
    <ul class="flex gy-2 w-full ">
        <?php foreach ($filteredItems as $book): ?>
            <li class="w-[33%] flex gap-y-2 flex-col">
                <img src="<?= $book['imageUrl'] ?>" alt="<?= $book['name'] ?>" class="w-[292px] h-[437px] object-cover">
                <a href="<?= $book['purchaseUrl'] ?>" target="_blank">
                    <?= $book['name'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <script src="https://cdn.tailwindcss.com"></script>

</body>

</html>