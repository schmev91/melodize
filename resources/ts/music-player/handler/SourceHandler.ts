import SourceType from "../../enums/SourceType";

export default function SourceHandler(type: SourceType): any {
    switch (type) {
        case SourceType.LOCAL:
            //
            break;
        case SourceType.SPOTIFY:
            //
            break;
        case SourceType.DEEZER:
            //
            break;
        case SourceType.YOUTUBE:
            //
            break;
        default:
            alert("Source type not found");
    }
}
