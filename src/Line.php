<?php

namespace MarcosTMunhoz\LaracastsTranscriptions;

class Line
{
    public function __construct(
        public string $timestamp,
        public string $text
    ) {}

    public static function isValid(string $line): bool
    {
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

    public function getBeginningTimestamp(): string
    {
        preg_match('/^\d{2}:\d{2}:\d{2}\.\d{3}/', $this->timestamp, $matches);

        return $matches[0];
    }

    public function toHtml(): string
    {
        return "<a href=\"?time={$this->getBeginningTimestamp()}\">{$this->text}</a>";
    }
}