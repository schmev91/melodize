var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var __generator = (this && this.__generator) || function (thisArg, body) {
    var _ = { label: 0, sent: function() { if (t[0] & 1) throw t[1]; return t[1]; }, trys: [], ops: [] }, f, y, t, g;
    return g = { next: verb(0), "throw": verb(1), "return": verb(2) }, typeof Symbol === "function" && (g[Symbol.iterator] = function() { return this; }), g;
    function verb(n) { return function (v) { return step([n, v]); }; }
    function step(op) {
        if (f) throw new TypeError("Generator is already executing.");
        while (g && (g = 0, op[0] && (_ = 0)), _) try {
            if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;
            if (y = 0, t) op = [op[0] & 2, t.value];
            switch (op[0]) {
                case 0: case 1: t = op; break;
                case 4: _.label++; return { value: op[1], done: false };
                case 5: _.label++; y = op[1]; op = [0]; continue;
                case 7: op = _.ops.pop(); _.trys.pop(); continue;
                default:
                    if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) { _ = 0; continue; }
                    if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) { _.label = op[1]; break; }
                    if (op[0] === 6 && _.label < t[1]) { _.label = t[1]; t = op; break; }
                    if (t && _.label < t[2]) { _.label = t[2]; _.ops.push(op); break; }
                    if (t[2]) _.ops.pop();
                    _.trys.pop(); continue;
            }
            op = body.call(thisArg, _);
        } catch (e) { op = [6, e]; y = 0; } finally { f = t = 0; }
        if (op[0] & 5) throw op[1]; return { value: op[0] ? op[1] : void 0, done: true };
    }
};
import LocaltrackParser from "../class/LocaltrackParser";
import { refreshCurrentPlayingFlag } from "../page/track-show";
import { call, formatTime, getOrigin } from "../utils";
import { trackTitle, trackArtist, trackCover, currentDuration, maxDuration, playerLabel, } from "./elements";
import { onloadHandler } from "./handler/index";
import { nextHandler } from "./handler/nextHandler";
import { playHandler } from "./handler/playHandler";
import { createPlayer } from "./player";
import { startProgressUpdater, stopProgressUpdater } from "./progress";
import visualizer from "./visualizer";
// FETCH AND INIT PLAYER FROM API
export function init(url) {
    return __awaiter(this, void 0, void 0, function () {
        var _this = this;
        return __generator(this, function (_a) {
            switch (_a.label) {
                case 0: return [4 /*yield*/, fetch(url)
                        .then(function (res) { return res.json(); })
                        .then(function (data) { return __awaiter(_this, void 0, void 0, function () {
                        return __generator(this, function (_a) {
                            play(data);
                            return [2 /*return*/];
                        });
                    }); })];
                case 1:
                    _a.sent();
                    return [2 /*return*/];
            }
        });
    });
}
export function play(data) {
    stopPlayer();
    globalThis.tracksList = parseService(data);
    globalThis.trackIndex = 0;
    //first run
    refresh();
    playHandler();
}
function parseService(data) {
    var Parser = new LocaltrackParser();
    data = data.map(Parser.parse);
    return data;
}
function stopPlayer() {
    if (globalThis.player)
        globalThis.player.stop();
}
export function refresh() {
    if (globalThis.player)
        globalThis.player.stop();
    var currentTrack = globalThis.tracksList[trackIndex];
    refreshCurrentPlayingFlag();
    //create a new Player with the current track index
    globalThis.player = createPlayer(currentTrack.url);
    globalThis.player
        .once("load", onloadHandler)
        .on("play", call(startProgressUpdater))
        .once("play", visualizer)
        .on("pause", stopProgressUpdater)
        .on("stop", stopProgressUpdater)
        .on("end", call(stopProgressUpdater, nextHandler));
    increaseListensCount(currentTrack.id);
    refreshPlayerView(currentTrack);
}
function refreshPlayerView(_a) {
    var id = _a.id, title = _a.title, artist = _a.artist, cover = _a.cover;
    // UPDATE TRACK LINK FOR LABEL
    playerLabel.href = "".concat(getOrigin(), "/tracks/").concat(id);
    // REFRESH VIEW FOR MUSIC PLAYER
    trackTitle.innerText = title;
    trackArtist.innerText = artist;
    trackCover.src = cover;
    // Set max duration for the current playing song
    currentDuration.innerText = formatTime(globalThis.player.seek());
    maxDuration.innerText = formatTime(globalThis.player.duration());
}
function increaseListensCount(trackId) {
    return __awaiter(this, void 0, void 0, function () {
        var url;
        return __generator(this, function (_a) {
            url = "".concat(getOrigin(), "/api/tracks/").concat(trackId, "/listen");
            fetch(url);
            return [2 /*return*/];
        });
    });
}
