<?php

namespace YouCast\ChatGPT\Entity;

class PromptTokensDetails
{
    private int $cached_tokens;
    private int $audio_tokens;

    public function __construct(array $data)
    {
        $this->cached_tokens = $data['cached_tokens'];
        $this->audio_tokens = $data['audio_tokens'];
    }

    public function getCachedTokens(): int
    {
        return $this->cached_tokens;
    }

    public function getAudioTokens(): int
    {
        return $this->audio_tokens;
    }
}
