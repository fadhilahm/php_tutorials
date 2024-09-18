<?php

function urlIs($value): bool {
    $url = parse_url(url: $value);
    return $url['path'] == $value;
}