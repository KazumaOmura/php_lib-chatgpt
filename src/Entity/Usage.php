<?php

namespace YouCast\ChatGPT\Entity;

class Usage
{
    private int $prompt_tokens;
    private int $completion_tokens;
    private int $total_tokens;
    private PromptTokensDetails $prompt_tokens_details;
    private CompletionTokensDetails $completion_tokens_details;

    public function __construct(array $data)
    {
        $this->prompt_tokens = $data['prompt_tokens'];
        $this->completion_tokens = $data['completion_tokens'];
        $this->total_tokens = $data['total_tokens'];
        $this->prompt_tokens_details = new PromptTokensDetails($data['prompt_tokens_details']);
        $this->completion_tokens_details = new CompletionTokensDetails($data['completion_tokens_details']);
    }

    public function getPromptTokens(): int
    {
        return $this->prompt_tokens;
    }

    public function getCompletionTokens(): int
    {
        return $this->completion_tokens;
    }

    public function getTotalTokens(): int
    {
        return $this->total_tokens;
    }

    public function getPromptTokensDetails(): PromptTokensDetails
    {
        return $this->prompt_tokens_details;
    }

    public function getCompletionTokensDetails(): CompletionTokensDetails
    {
        return $this->completion_tokens_details;
    }

}
