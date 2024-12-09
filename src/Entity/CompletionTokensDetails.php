<?php

namespace YouCast\ChatGPT\Entity;

class CompletionTokensDetails
{
    private int $reasoning_tokens;
    private int $audio_tokens;
    private int $accepted_prediction_tokens;
    private int $rejected_prediction_tokens;

    public function __construct(array $data)
    {
        $this->reasoning_tokens = $data['reasoning_tokens'];
        $this->audio_tokens = $data['audio_tokens'];
        $this->accepted_prediction_tokens = $data['accepted_prediction_tokens'];
        $this->rejected_prediction_tokens = $data['rejected_prediction_tokens'];
    }

    public function getReasoningTokens(): int
    {
        return $this->reasoning_tokens;
    }

    public function getAudioTokens(): int
    {
        return $this->audio_tokens;
    }

    public function getAcceptedPredictionTokens(): int
    {
        return $this->accepted_prediction_tokens;
    }

    public function getRejectedPredictionTokens(): int
    {
        return $this->rejected_prediction_tokens;
    }
}
