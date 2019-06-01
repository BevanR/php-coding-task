<?php

namespace Orm;

require('ActiveRecord.php');

final class DownloadLog extends ActiveRecord
{
    /* @var int */
    private $fileId;

    /* @var int */
    private $userId;
}
