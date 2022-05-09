<?php

namespace MarcosTMunhoz\LaracastsTranscriptions;

class Transcription
{
    /** @var string[] */
    protected array $lines;

    public static function load(string $path): static
    {
        $instance = new static();

        $instance->lines = $instance->discardIrrelevantLines(file($path));

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
    protected function discardIrrelevantLines(array $lines): array
    {
        return array_values(
            array_filter( 
                array_map('trim', $lines),
                function (string $line): bool {
                    // ignores WEBVTT header
                    if ($line === 'WEBVTT') {
                        return false;
                    }

                    // ignores lines with only numbers
                    if (is_numeric($line)) {
                        return false;
                    }

                    // ignores empty lines
                    return (bool) $line;
                }
            )
        );
    }
}