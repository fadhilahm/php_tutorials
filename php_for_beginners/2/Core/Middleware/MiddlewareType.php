<?php

namespace Core\Middleware;

enum MiddlewareType: string {
    case AUTH = 'auth';
    case GUEST = 'guest';

    public function getClass(): string {
        return match($this) {
            self::AUTH => Auth::class,
            self::GUEST => Guest::class
        };
    }
} 