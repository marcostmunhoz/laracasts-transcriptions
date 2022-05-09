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
