import { LocaltrackInterface } from "../interface/SourceHandler";
import Track from "../interface/Track";

export default class LocaltrackParser implements LocaltrackInterface {
    parse(track: Track): Track {
        const storagePath = `${window.location.href}storage/`;
        track.cover = storagePath + track.cover;
        track.url = storagePath + track.url;
        return track;
    }
}
