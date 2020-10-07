<?php

$voice = isset($_GET['voice']) ? $_GET['voice'] : 'en-US_AllisonV3Voice';

$result = 'https://text-to-speech-demo.ng.bluemix.net/api/v3/synthesize?text=' . str_replace(' ', '+', $value) . '&voice=' . $voice . '&download=true&accept=audio%2Fmp3';
