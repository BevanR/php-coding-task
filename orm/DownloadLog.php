<?php

namespace Orm;

use Util\InvalidArgumentException;
use Util\NumberValidator;

require_once('ActiveRecord.php');
require_once('Util/NumberValidator.php');

final class DownloadLog extends ActiveRecord
{
    use NumberValidator;

    /* @var int */
    private $fileId;

    /* @var int */
    private $userId;

    static function create(): DownloadLog
    {
        return new DownloadLog();
    }

    public function __destruct()
    {
        echo('Destroying DownloadLog');
    }

    /**
     * Indicates that the underlying row of data within the model has been
     * modified
     *
     * @return boolean
     */
    public function isModified(): bool
    {
        return $this->isModified;
    }

    /**
     * @param $fileId
     * @return DownloadLog
     * @throws InvalidArgumentException
     */
    public function setFileId($fileId): DownloadLog
    {
        $this->fileId = $this->validSerialIdentifier($fileId);
        $this->isModified = true;
        return $this;
    }

    /**
     * @param $userId
     * @return DownloadLog
     * @throws InvalidArgumentException
     */
    public function setUserId($userId): DownloadLog
    {
        $this->userId = $this->validSerialIdentifier($userId);
        $this->isModified = true;
        return $this;
    }

    /**
     * @return int
     */
    public function getFileId(): int
    {
        return $this->fileId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }
}
