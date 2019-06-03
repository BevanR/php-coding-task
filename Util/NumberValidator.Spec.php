<?php
require('orm/DownloadLog.php');

use Orm\DownloadLog;
use Util\InvalidArgumentException;

/**
 * TODO Use a test suite.
 */
$downloadLog = DownloadLog::create();

$downloadLog->setFileId('1000');
$downloadLog->setFileId(1000);
$downloadLog->setFileId(0x1000);
$downloadLog->setFileId('1');
$downloadLog->setFileId(1);

try {
    $downloadLog->setFileId('0');
    throw new Exception('Expected exception');
} catch (InvalidArgumentException $e) {
}

try {
    $downloadLog->setFileId(0);
    throw new Exception('Expected exception');
} catch (InvalidArgumentException $e) {
}

try {
    $downloadLog->setFileId(-1);
    throw new Exception('Expected exception');
} catch (InvalidArgumentException $e) {
}

try {
    $downloadLog->setFileId('-1');
    throw new Exception('Expected exception');
} catch (InvalidArgumentException $e) {
}

try {
    $downloadLog->setFileId('-1111');
    throw new Exception('Expected exception');
} catch (InvalidArgumentException $e) {
}

try {
    $downloadLog->setFileId(-111);
    throw new Exception('Expected exception');
} catch (InvalidArgumentException $e) {
}

try {
    $downloadLog->setFileId(12.3);
    throw new Exception('Expected exception');
} catch (InvalidArgumentException $e) {
}

try {
    $downloadLog->setFileId(17 / 3);
    throw new Exception('Expected exception');
} catch (InvalidArgumentException $e) {
}

try {
    $downloadLog->setFileId(0 - 17 / 3);
    throw new Exception('Expected exception');
} catch (InvalidArgumentException $e) {
}

