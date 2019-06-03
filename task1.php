<?php
require_once('orm/DownloadLog.php');

use Orm\DownloadLog;

// This was copied from README.md.
// New line characters were inserted at end of lines starting with `echo`.
$downloadLog = DownloadLog::create();
echo ($downloadLog->isModified() ? 'DownloadLog is modified' : 'DownloadLog is not modified') . "\n";
$downloadLog->setFileId(1000)->setUserId(2000);
echo ($downloadLog->isModified() ? 'DownloadLog is modified' : 'DownloadLog is not modified') . "\n";
echo ("UserId is: " . $downloadLog->getUserId()) . "\n";
