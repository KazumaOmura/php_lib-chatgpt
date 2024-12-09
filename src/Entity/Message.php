<?php

namespace YouCast\ChatGPT\Entity;

class Message
{
    private string $role;
    private string $content;
    private $refusal;

    public function __construct(array $data)
    {
        $this->role = $data['role'];
        $this->content = $data['content'];
        $this->refusal = $data['refusal'] ?? null;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getRefusal()
    {
        return $this->refusal;
    }
}
