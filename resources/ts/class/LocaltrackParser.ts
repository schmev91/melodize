import { LocaltrackInterface } from "../interface/SourceHandler";
import Track from "../interface/Track";

export default class LocaltrackParser implements LocaltrackInterface {
    parse(track: Track): Track {
        const storagePath = `${window.location.href}storage/`;
        if (track.cover) track.cover = storagePath + track.cover;
        else track.cover = storagePath + "img/default/track_old.png";
        track.url = storagePath + track.url;
        return track;
    }
}
