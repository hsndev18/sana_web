<?php

namespace App\Enums\Status;

enum VideoStatus: string
{
    case PENDING = 'pending'; // PENDING

    case DOWNLOADED = 'downloaded'; // DOWNLOADED

    case TRANSCRIBED = 'transcribed'; //TRANSCRIBED

    case COMPLETED = 'completed'; // COMPLETED

    case FAILED = 'failed'; // FAILED

    public function isPending(): bool
    {
        return $this === self::PENDING;
    }

    public function isDownloaded(): bool
    {
        return $this === self::DOWNLOADED;
    }


    public function isTranscribed(): bool
    {
        return $this === self::TRANSCRIBED;
    }

    public function isCompleted(): bool
    {
        return $this === self::COMPLETED;
    }


    public function isNotCompleted(): bool
    {
        return $this !== self::COMPLETED;
    }

    public function isFailed(): bool
    {
        return $this === self::FAILED;
    }

    public function name(): string
    {
        return match ($this) {
            self::PENDING => 'في الانتظار',
            self::DOWNLOADED => 'تم التحميل',
            self::TRANSCRIBED => 'تم استخراج النص',
            self::COMPLETED => 'جاهز',
            self::FAILED => 'فشل',
        };
    }

    public static function toArray(): array
    {
        return [
            self::PENDING->value,
            self::DOWNLOADED->value,
            self::TRANSCRIBED->value,
            self::COMPLETED->value,
            self::FAILED->value,
        ];
    }
}
