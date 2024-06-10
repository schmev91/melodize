import { LocaltrackInterface } from "../interface/SourceHandler";
import Track from "../interface/Track";
import { getOrigin } from "../utils";

export default class LocaltrackParser implements LocaltrackInterface {
    parse(track: Track): Track {
        const storagePath = `${getOrigin()}/storage/`;
        track.cover = storagePath + track.cover;
        track.url = storagePath + track.url;
        return track;
    }
}
