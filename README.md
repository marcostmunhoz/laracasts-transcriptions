# Laracasts Transcriptions

A small package developed during the ["Write a Composer Package With Me" series](https://laracasts.com/series/write-a-composer-package-with-me), from Laracasts.

## Usage

```php
use MarcosTMunhoz\LaracastsTranscriptions\Transcription;

$transcription = Transcription::load('path/to/file.vtt');

foreach ($transcription->lines() as $line) {
    // Properties
    $line->position; // The current line position
    $line->timestamp; // Full line timestamp (start - end)
    $line->text; // The line text for the given timestamp

    // Methods
    $line->getBeginningTimestamp(); // Returns the beginning timestamp in H:i:s.v format
    $line->toHtml(); // Returns an HTML (anchor tag) representation of the line
}
```