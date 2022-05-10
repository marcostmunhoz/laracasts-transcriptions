<?php

namespace MarcosTMunhoz\LaracastsTranscriptions;

use Stringable;

class Transcription implements Stringable
{
    /**
     * @var string[]
     */
    protected array $lines;

    /**
     * @param string[] $lines 
     * 
     * @return void 
     */
    public function __construct(array $lines)
    {
        $this->lines = $this->discardInvalidLines(
            array_map('trim', $lines)
        );
    }

    public static function load(string $path): static
    {
        return new static(file($path));
    }

    public function __toString(): string
    {
        return implode("\n", $this->lines);
    }

    public function lines(): LineCollection
    {
        return new LineCollection(array_map(
            fn (array $line) => new Line(...$line),
            array_chunk($this->lines, 3)
        ));
    }

    /**
     * Discards all invalid lines.
     * Invalid lines are:
     * - Header (WEBVTT) line
     * - Empty lines
     * 
     * @param string[] $lines
     * 
     * @return string[]
     */
    protected function discardInvalidLines(array $lines): array
    {
        return array_slice(array_filter(array_map('trim', $lines)), 1);
    }
}