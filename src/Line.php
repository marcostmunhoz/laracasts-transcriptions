<?php

namespace MarcosTMunhoz\LaracastsTranscriptions;

class Line
{
    public function __construct(
        public int $position,
        public string $timestamp,
        public string $text
    ) {}

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