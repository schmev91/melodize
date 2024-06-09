<?php
namespace App\Services;

use App\Models\Track;

class TrackService
{
    /**
     * @param string $text the text query to search for
     * @return array of tracks
     */public static function search(string $text)
    {
        $query = Track::query();

        if ($text) {
            $query->where('title', 'like', "%$text%")
                ->orWhere('artist', 'like', "%$text%")
                ->orWhereHas('genres', function ($q) use ($text) {
                    $q->where('name', 'like', "%$text%");
                });
        }

        return $query->get();
    }
}
