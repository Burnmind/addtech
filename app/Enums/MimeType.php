<?php

namespace App\Enums;


enum MimeType: string
{
    case PNG = 'image/png';
    case JPG = 'image/jpeg';
    case OCTET_STREAM = 'application/octet-stream';
    case TEXT_PLAIN = 'text/plain';

    static function getImageTypes(): array
    {
        return [
            MimeType::JPG->value,
            MimeType::PNG->value
        ];
    }
    static function getDetailTypes(): array
    {
        return [
            MimeType::OCTET_STREAM->value,
            MimeType::TEXT_PLAIN->value
        ];
    }
}
