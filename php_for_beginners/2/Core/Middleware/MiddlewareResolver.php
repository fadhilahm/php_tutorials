<?php

namespace Core\Middleware;

class MiddlewareResolver {
    public static function resolve($type) {
        if (!$type) {
            return;
        }

        $middlewareType = MiddlewareType::tryFrom($type);
        
        if (!$middlewareType) {
            throw new \Exception("No matching middleware found for key '{$type}'.");
        }

        $middlewareClass = $middlewareType->getClass();
        (new $middlewareClass)->handle();
    }
} 