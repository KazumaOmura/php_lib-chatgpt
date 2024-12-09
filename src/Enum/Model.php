<?php

namespace YouCast\ChatGPT\Enum;

class Model
{
    const GPT4 = 'gpt-4';
    const GPT3 = 'gpt-3';
    const GPT35TURBO = 'gpt-3.5-turbo';

    const ALLOWED_MODELS = [
        self::GPT4,
        self::GPT3,
        self::GPT35TURBO,
    ];
}