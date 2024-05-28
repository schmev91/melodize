<?php

namespace App\Enums;

enum SourceType: string {
    case LOCAL   = 'local';
    case SPOTIFY = 'spotify';
    case DEEZER  = 'deezer';
    case YOUTUBE = 'youtube';
}
