<?php

function dd($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit();
}

function urlIs($value): bool {
    $url = parse_url(url: $value);
    return $url['path'] == $value;
}

function abort($code = Response::NOT_FOUND): void {
    http_response_code(response_code: $code);
    require "views/{$code}.php";
    exit;
}

function authorize($condition, $response = Response::FORBIDDEN) {
    if (!$condition) {
        http_response_code(response_code: $response);
        abort(code: $response);
    }
    return;
}

function base_path($path = ""): string {
    return BASE_PATH . $path;
}

function view($path, $data = []): void {
    extract($data);
    require base_path("views/{$path}.view.php");
}
