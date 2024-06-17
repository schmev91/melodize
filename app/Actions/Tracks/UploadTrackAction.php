<?php

namespace App\Actions\Tracks;

use App\Models\Track;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class UploadTrackAction
{
    use AsAction;

    public function handle(array $data): bool
    {
        if (!Auth::check()) {
            return false;
        }

        if (!$data[ Track::COVER ]) {
            $coverName = track::DEFAULT_COVER;
        } else {
            $coverName = uniqid() . '.' . $data[ track::COVER ]->getClientOriginalExtension();
            $data[ track::COVER ]->storeAs('public/img/covers', $coverName);
        }

        $coverPath = Track::COVER_DIR . "/$coverName";
        if (!file_exists(public_path("storage/$coverPath"))) {
            return false;
        }

        $audioName = uniqid() . '.' . $data[ 'audio' ]->getClientOriginalExtension();
        $data[ 'audio' ]->storeAs('public/tracks', $audioName);

        $audioPath = Track::TRACK_DIR . "/$audioName";
        if (!file_exists(public_path("storage/$audioPath"))) {
            return false;
        }

        $data[ track::COVER ]   = $coverPath;
        $data[ track::URL ]     = $audioPath;
        $data[ track::USER_ID ] = Auth::id();

        track::create($data);

        return true;
    }
}
