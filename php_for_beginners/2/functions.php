<?php

function urlIs($value): bool {
    $url = parse_url(url: $value);
    return $url['path'] == $value;
}

function abort($code = Response::NOT_FOUND): void {
    http_response_code(response_code: $code);
    require "views/{$code}.php";
    exit;
}
