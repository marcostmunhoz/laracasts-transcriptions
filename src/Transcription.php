<?php

namespace MarcosTMunhoz\LaracastsTranscriptions;

class Transcription
{
    /** @var string[] */
    protected array $lines;

    public static function load(string $path): static
    {
        $instance = new static();

        $instance->lines = $instance->discardInvalidLines(file($path));

        return $instance;
    }

    public function __toString(): string
    {
        return implode("\n", $this->lines);
    }

    public function lines(): array
    {
        return $this->lines;
    }

    /**
     * @param string[] $lines
     * 
     * @return string[]
     */
    protected function discardInvalidLines(array $lines): array
    {
        return array_values(array_filter( 
                array_map('trim', $lines),
                fn (string $line) => Line::isValid($line)
            )
        );
    }
}