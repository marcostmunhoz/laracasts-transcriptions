<?php

use MarcosTMunhoz\LaracastsTranscriptions\Line;
use MarcosTMunhoz\LaracastsTranscriptions\Transcription;

test('it loads a vtt file', function () {
    // given
    $fixture = file_get_contents(__DIR__.'/fixtures/basic-example-fixture.txt');

    // when
    $transcription = Transcription::load(__DIR__.'/stubs/basic-example.vtt');

    // then
    expect($fixture)->toEqual($transcription);
});

test('it can convert to an array of line objects', function () {
    // given
    $transcription = Transcription::load(__DIR__.'/stubs/basic-example.vtt');

    // when
    $lines = $transcription->lines();

    // then
    expect($lines)->toHaveCount(2);
    expect($lines)->each->toBeInstanceOf(Line::class);
});

test('it renders the lines as html', function () {
    // given
    $transcription = Transcription::load(__DIR__.'/stubs/basic-example.vtt');
    $fixture = file_get_contents(__DIR__.'/fixtures/basic-example-fixture.html');

    // when
    $html = $transcription->lines()->toHtml();

    // then
    expect($html)->toEqual($fixture);
});
