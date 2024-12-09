<?php

namespace YouCast\ChatGPT\Entity;

class Response
{
    private string $id;
    private int $created;
    private string $model;
    /* @var Choise[] */
    private array $choices;
    private Usage $usage;
    private $system_fingerprint;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->created = $data['created'];
        $this->model = $data['model'];
        $this->choices = array_map(fn($choice) => new Choise($choice), $data['choices']);
        $this->usage = new Usage($data['usage']);
        $this->system_fingerprint = $data['system_fingerprint'] ?? null;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getChoices(): array
    {
        return $this->choices;
    }

    public function getUsage(): Usage
    {
        return $this->usage;
    }

    public function getSystemFingerprint()
    {
        return $this->system_fingerprint;
    }

}