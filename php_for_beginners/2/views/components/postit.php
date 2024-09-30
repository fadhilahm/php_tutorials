<?php


echo "
        <div class='relative bg-yellow-200 p-6 w-72 h-72 rounded shadow-lg transform rotate-2 hover:rotate-0 transition duration-300 ease-in-out'>
            <div class='absolute top-1 left-1 w-4 h-4 bg-yellow-400 rounded-full'></div>
            <div class='font-bold text-lg text-gray-800 mb-2'>{$item['title']}</div>
            <p class='text-gray-700'>
                {$item['content']}
            </p>
";

if (!empty($item['name'])) {
    echo "
        <div class='absolute bottom-1 right-2 text-gray-600 text-sm italic'>
            - {$item['name']}
        </div>
    ";
}

echo "</div>";
