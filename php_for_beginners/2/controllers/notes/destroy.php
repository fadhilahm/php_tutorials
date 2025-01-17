<?php

$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $params['id']
]);

header('Location: /notes');
exit(); 