<?php

namespace Orm;

require('ActiveRecord.php');

final class DownloadLog extends ActiveRecord
{
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
     * @param int $fileId
     * @return DownloadLog
     */
    public function setFileId(int $fileId): DownloadLog
    {
        $this->fileId = $fileId;
        $this->isModified = true;
        return $this;
    }

    /**
     * @param int $userId
     * @return DownloadLog
     */
    public function setUserId(int $userId): DownloadLog
    {
        $this->userId = $userId;
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
