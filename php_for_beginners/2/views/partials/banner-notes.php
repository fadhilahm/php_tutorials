<?php
ob_start();
include base_path('views/components/create-new-note-button.php');
$button = ob_get_clean();

echo '
<header class="bg-white shadow flex w-full items-center justify-between px-[22rem] py-6">
    <div>
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">
' . $banner . '
        </h1>
    </div>
    <div>
' . $button . '
    </div>
</header>';
