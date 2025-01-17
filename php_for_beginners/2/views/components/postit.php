<?php
// Escape the data
$title = htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8');
$content = htmlspecialchars($item['content'], ENT_QUOTES, 'UTF-8');
$name = !empty($item['name']) ? htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') : '';
$id = htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8');

echo "
        <div class='relative bg-yellow-200 p-6 w-72 h-72 rounded shadow-lg transform rotate-2 hover:rotate-0 transition duration-300 ease-in-out'>
            <div class='absolute top-1 left-1 w-4 h-4 bg-yellow-400 rounded-full'></div>
            <form class='absolute top-2 right-2 cursor-pointer' method='POST' action='/notes/{$id}'>
                <input type='hidden' name='_method' value='DELETE'>
                <button type='submit' class='text-red-500 hover:text-red-700 transition-colors duration-200'>
                    <svg class='w-5 h-5' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
                        <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12'></path>
                    </svg>
                </button>
            </form>
            <a href='/notes/{$id}' class='block'>
              <div class='font-bold text-lg text-gray-800 mb-2'>{$title}</div>
            </a>
            <p class='text-gray-700'>
                {$content}
            </p>
";

if (!empty($name)) {
    echo "
        <div class='absolute bottom-1 right-2 text-gray-600 text-sm italic'>
            - {$name}
        </div>
    ";
}

echo "</div>";
