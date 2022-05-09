<?php

namespace MarcosTMunhoz\LaracastsTranscriptions;

class Transcription
{
    /** @var string[] */
    protected array $lines;

    public static function load(string $path): static
    {
        $instance = new static();

        $instance->lines = file($path);

        return $instance;
    }

    public function __toString(): string
    {
        return implode('', $this->lines);
    }

    public function lines(): array
    {
        return $this->lines;
    }
}