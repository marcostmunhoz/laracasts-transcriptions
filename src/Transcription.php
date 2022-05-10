<?php

namespace MarcosTMunhoz\LaracastsTranscriptions;

class Transcription
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

    /**
     * @return Line[]
     */
    public function lines(): array
    {
        return array_map(
            fn (array $line) => new Line(...$line),
            array_chunk($this->lines, 2)
        );
    }

    public function toHtml(): string
    {
        return implode(
            "\n",
            array_map(
                fn (Line $line) => $line->toHtml(),
                $this->lines()
            )
        );
    }

    /**
     * @param string[] $lines
     * 
     * @return string[]
     */
    protected function discardInvalidLines(array $lines): array
    {
        return array_values(array_filter(
            $lines,
            fn (string $line) => Line::isValid($line)
        ));
    }
}