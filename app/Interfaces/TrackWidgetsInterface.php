<?php

namespace App\Interfaces;

use App\Models\Playlist;

interface TrackWidgetsInterface
{
    public function comment(float $timestamp = null) : void;
    public function like() : void;
    public function addPlaylist(Playlist $playlist) : void;
    public function addQueue() : void;
}
