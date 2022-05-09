<?php

use MarcosTMunhoz\LaracastsTranscriptions\Transcription;

test('it loads a vtt file', function () {
    // given
    $fixture = file_get_contents(__DIR__.'/fixtures/basic-example-fixture.txt');

    // when
    $transcription = Transcription::load(__DIR__.'/stubs/basic-example.vtt');

    // then
    expect($fixture)->toEqual($transcription);
});

test('it can convert to an array of lines', function () {
    // given
    $transcription = Transcription::load(__DIR__.'/stubs/basic-example.vtt');

    // when
    $lines = $transcription->lines();

    // then
    expect($lines)->toHaveCount(4);
});