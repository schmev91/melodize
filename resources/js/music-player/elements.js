var body = document.querySelector("body");

var musicPlayer = document.getElementById("music-player");

var playBtn = document.getElementById("player-play");
var pauseBtn = document.getElementById("player-pause");
var previousBtn = document.getElementById("player-previous");
var nextBtn = document.getElementById("player-next");
var loopBtn = document.getElementById("player-loop");
var shuffleBtn = document.getElementById("player-shuffle");

var progress = document.getElementById("player-progress");

var currentDuration = document.getElementById("current-duration");
var maxDuration = document.getElementById("max-duration");

var visualizeCanvas = document.getElementById("visualize-canvas");

export {
    body,
    musicPlayer,
    playBtn,
    pauseBtn,
    previousBtn,
    nextBtn,
    loopBtn,
    shuffleBtn,
    currentDuration,
    maxDuration,
    progress,
    visualizeCanvas,
};
