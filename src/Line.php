<?php

namespace MarcosTMunhoz\LaracastsTranscriptions;

class Line
{
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
}