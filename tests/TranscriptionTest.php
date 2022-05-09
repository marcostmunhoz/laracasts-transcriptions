<?php

use MarcosTMunhoz\LaracastsTranscriptions\Transcription;

test('it loads a vtt file', function () {
    // given
    $path = __DIR__.'/stubs/basic-example.vtt';
    $fileContents = file_get_contents($path);

    // when
    $transcription = Transcription::load($path);

    // then
    expect($fileContents)->toEqual($transcription);
});

test('it can convert to an array of lines', function () {
    // given
    $transcription = Transcription::load(__DIR__.'/stubs/basic-example.vtt');

    // when
    $lines = $transcription->lines();

    // then
    expect($lines)->toHaveCount(9);
});