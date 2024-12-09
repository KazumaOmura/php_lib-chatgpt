<?php

namespace YouCast\ChatGPT\Entity;

class Choise
{
    private int $index;
    private Message $message;
    private $logprobs;
    private $finish_reason;

    public function __construct(array $data)
    {
        $this->index = $data['index'];
        $this->message = new Message($data['message']);
        $this->logprobs = $data['logprobs'] ?? null;
        $this->finish_reason = $data['finish_reason'] ?? null;
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function getMessage(): Message
    {
        return $this->message;
    }

    public function getLogprobs()
    {
        return $this->logprobs;
    }

    public function getFinishReason()
    {
        return $this->finish_reason;
    }
}
