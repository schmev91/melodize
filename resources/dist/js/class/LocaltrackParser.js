import { getOrigin } from "../utils";
var LocaltrackParser = /** @class */ (function () {
    function LocaltrackParser() {
    }
    LocaltrackParser.prototype.parse = function (track) {
        var storagePath = "".concat(getOrigin(), "/storage/");
        track.cover = storagePath + track.cover;
        track.url = storagePath + track.url;
        return track;
    };
    return LocaltrackParser;
}());
export default LocaltrackParser;
