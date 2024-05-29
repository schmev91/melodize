import Track from "./Track";

interface SourceHandler {
    parse(source: any): any;
}

export interface LocaltrackInterface extends SourceHandler {
    parse(track: Track): Track;
}
