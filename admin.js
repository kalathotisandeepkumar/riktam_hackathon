// Create timelines
let totemAppear,
    totemLoop,
    keyboardAppear,
    keyboardDisappear,
    stopTotemLoop = false;
setupTotemLoop();
setupTotemAppear();
setupBoxesToKeyboard();
setupHideKeyboard();

let pin = [];

// Transform totem to keyboard
window.onclick = totemToKeyboard;
function totemToKeyboard() {
    window.onclick = function () { };
    stopTotemLoop = true;
}

// Keyboard functionality
const keysOverlays = Array.from(document.querySelectorAll(".key-btn"));
keysOverlays.forEach(function (key) {
    key.onclick = onKeyClick;
});
document.querySelector(".pin-reset").onclick = pinReset;

// Show graphics onload
TweenMax.to(".container", 0.2, {
    opacity: 1
});


// -------------------------
// Handle keyboard

function onKeyClick(e) {
    const pinCode = document.querySelector(".pin-code");
    if (!pinCode.classList.contains("pin-entered")) {
        const highlight = e.target.parentElement.querySelector(".key-highlight");
        TweenMax.to(highlight, 0.3, {
            attr: { opacity: 0.4 }
        });
        TweenMax.to(highlight, 0.2, {
            delay: 0.3,
            attr: { opacity: 0 }
        });
    }
    if (pin.length < 4) {
        if (pin.length === 3) {
            pinCode.classList.add("pin-entered");
        }
        pin.push(e.target.getAttribute("data-key-value"));
        updatePIN();
        if (pin.length === 4) {

           if(pin[0]==1&&pin[1]==8&&pin[2]==3&&pin[3]==7){
                    alert("Sucessfully Entered")
                keyboardDisappear.play(0);
                setTimeout(function(){ location.href="index.php"; }, 1500);

                        

            }
            else{
                    alert("Incorrect Pin")
            }
        }
    }
}
function updatePIN() {
    const pinPlaces = Array.from(document.querySelectorAll(".pin-code-number"));
    const dur = 0.1;
    pinPlaces.forEach(function (place, idx) {
        if (pin[idx]) {
            place.innerHTML = pin[idx];
            TweenMax.to(place, dur, {
                color: "#fff",
                borderBottomColor: "transparent"
            })
        } else {
            TweenMax.to(place, dur, {
                color: "transparent",
                borderBottomColor: "#fff"
            })
        }
    });
    TweenMax.to(".pin-reset", dur, {
        opacity: pin.length ? 1 : 0.1
    })
}
function pinReset() {
    pin = [];
    const pinCode = document.querySelector(".pin-code");
    pinCode.classList.remove("pin-entered");
    TweenMax.delayedCall(0.1, updatePIN);
}



// -------------------------
// Totem appear animation (play totem loop when finished)

function setupTotemAppear() {
    totemAppear = new TimelineMax({ })
        .fromTo(".portal", 0.5, {
            attr: { opacity: 0 }
        }, {
            attr: { opacity: 1 }
        }, 0)
        .fromTo(".keyboard", 1, {
            y: 250
        }, {
            y: 0
        }, 0.45)
        .fromTo(".keyboard-mask", 1, {
            y: -250
        }, {
            y: 0,
            onComplete: function () {
                totemLoop.play(0);
            }
        }, 0.45);
}

// -------------------------
// Totem animation (stop playing if stopTotemLoop flag set)

function setupTotemLoop() {
    const cubeHeight = 43;
    const topCubeFallingDur = 0.7;
    const cubeBouncingStep = 6;

    totemLoop = new TimelineMax({
        repeat: -1,
        paused: true,
        onRepeat: function() {
            if (stopTotemLoop) {
                this.pause();
                keyboardAppear.play(0);
                TweenMax.fromTo(".pin-code", 0.9, {
                    opacity: 0,
                    y: -40
                },{
                    opacity: 1,
                    y: 0
                });
            }
        }
    })
        .set([".keyboard", ".keyboard-mask"], {
            y: 0
        }, 0)
        .fromTo(".top-row", topCubeFallingDur, {
            y: -200
        }, {
            y: -cubeHeight,
            ease: Power0.easeOut
        }, 0)
        .fromTo(".top-row", 0.4, {
            attr: { opacity: 0 }
        }, {
            attr: { opacity: 1 }
        }, 0)
        .fromTo(".keyboard", 0.3, {
            y: 0
        }, {
            y: cubeHeight,
            ease: Power0.easeOut
        }, 0.7)
        .fromTo(".keyboard-mask", 0.3, {
            y: 0
        }, {
            y: -cubeHeight,
            ease: Power0.easeOut
        }, 0.7);

    const keyboardRows = Array.from(document.querySelectorAll(".row")).reverse();
    keyboardRows.forEach(function (cube, idx) {
        totemLoop.to(cube, 0.2, {
            y: "+=" + (cubeBouncingStep * (idx * 0.7 + 1)),
        }, topCubeFallingDur + 0.05 * idx);
    });
    keyboardRows.forEach(function (cube, idx) {
        totemLoop.to(cube, 0.08 * (keyboardRows.length - idx), {
            y: "-=" + (cubeBouncingStep * (idx * 0.7 + 1)),
        }, topCubeFallingDur + 0.05 * (keyboardRows.length - 1) + 0.01 + 0.2);
    });
    totemLoop.timeScale(1.5);
}

// -------------------------
// Transform totem boxes to the keyboard

function setupBoxesToKeyboard() {
    keyboardAppear = new TimelineMax({
        paused: true
    })
        .to(".title", 0.3, {
            opacity: 0
        }, 0)
        .set([".keyboard", ".keyboard-mask"], {
            y: 0
        }, 0)
        .to(".top-side", 0.3, {
            attr: {
                d: "M30,12.5 l28,0 l28,0 l-28,0 z"
            },
            ease: Power2.easeIn
        }, 0)
        .to(".left-side", 0.3, {
            attr: {
                d: "M30,12.5 l28,0 v36 l-28,0 z"
            },
            ease: Power2.easeIn
        }, 0)
        .to(".right-side", 0.3, {
            attr: {
                d: "M58,12.5l28,0 v36 l-28,0 z"
            },
            ease: Power2.easeIn
        }, 0)

        .to(".right-side", 0.5, {
            attr: {
                d: "M58,12.5l36,0 v36 l-36,0 z"
            },
            ease: Power2.easeOut
        }, 0.3)
        .to(".left-side", 0.4, {
            attr: {
                d: "M58,12.5l0,0 v36 l0,0 z",
                fill: "#5300d6"
            },
            ease: Power2.easeOut
        }, 0.3)
        .to(".cube", 0.5, {
            x: "-=25",
            ease: Power2.easeOut
        }, 0.3)
        .to(".keyboard", 0.5, {
            x: "+=10",
            ease: Power2.easeOut
        }, 0.3)

        .to(".key--left-side", 0.5, {
            x: -43
        }, "-=0.3")
        .to(".key--right-side", 0.5, {
            x: 43
        }, "-=0.5")
        .to("text", 0.5, {
            attr: { opacity: 1 }
        }, "-=0.5")

        .fromTo(".key", 0.5, {
            scale: 1,
            transformOrigin: "center center"
        }, {
            scale: 1.1,
            transformOrigin: "center center"
        }, "-=0.5")

        .to(".portal path", 0.3, {
            attr: {"d": "M22,168 l37,0 l37,0 l10,18.4 l-93,0 z "}
        }, 0)
        .to(".portal path", 0.3, {
            scaleX: 1.8,
            svgOrigin: "57 150"
        }, 0.5)

        .to(".graphics", 0.8, {
            scale: 1.5,
            transformOrigin: "center center"
        }, 0)
        .set(".keyboard-mask", {
            attr: { "d" : "M-30,0 h197 v179.5 h-197z" }
        }, 0.5);
}

// -------------------------
// Hide keyboard (reset the app when complete)

function setupHideKeyboard() {
    keyboardDisappear = new TimelineMax({
        paused: true,
        startDelay: 0.2
    })
        .to(".pin-code", 0.5, {
            opacity: 0,
            y: -40
        })
        .to(".keyboard", 1, {
            y: 200
        }, 0)
        .to(".portal", 0.5, {
            attr: { opacity: 0 }
        }, 0.4)
        .to(".keyboard-mask", 1, {
            y: -200,
            onComplete: function () {
                totemLoop.pause(0);
                keyboardAppear.pause(0);
                TweenMax.set(".keyboard", {
                    y: 250
                });
                TweenMax.set(".keyboard-mask", {
                    y: -250
                });
                pinReset();
                stopTotemLoop = false;
                TweenMax.delayedCall(0.5, function () {
                    totemAppear.play(0);
                    window.onclick = totemToKeyboard;
                });
					 TweenMax.to(".title", 0.3, {
                    delay: 1,
						  opacity: 1
                });
            }
        }, 0)
        .timeScale(0.6);
}