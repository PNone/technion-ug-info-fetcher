<?php

// Print errors only once: https://stackoverflow.com/a/9002669
ini_set('log_errors', 'On');
ini_set('display_errors', 'Off');

// Include argument values.
ini_set('zend.exception_ignore_args', 'Off');
ini_set('zend.exception_string_param_max_len', '15');

// set_error_handler(
//     function($severity, $message, $file, $line) {
//         xdebug_break();
//     }
// );

require_once 'course_info_fetcher.php';

$longopts  = [
    "cache_dir:",
    "semester:",
    "course_cache_life:",
    "simultaneous_downloads:",
    "download_timeout:",
    "verbose",
];
$options = getopt('', $longopts);
if (!isset($options['semester'])) {
    echo "Semester is not specified\n";
    exit(1);
}

$fetched = course_info_fetcher\fetch($options);
if ($fetched === false) {
    echo "Fetching failed\n";
    exit(1);
}

if (count($fetched['info']) == 0) {
    echo "No courses were fetched\n";
    exit(1);
}

echo "Downloaded {$fetched['downloaded']} courses to cache\n";
$has_failed = $fetched['failed'] > 0;
if ($has_failed) {
    echo "WARNING: failed to download {$fetched['failed']} courses\n";
    echo "You might want to run the script again\n";
}

$filename = "courses_{$fetched['semester']}.json";
echo "Writing result to '$filename'\n";
file_put_contents($filename, json_encode($fetched['info'], JSON_UNESCAPED_UNICODE));

echo "Done!\n";
exit($has_failed ? 1 : 0);
