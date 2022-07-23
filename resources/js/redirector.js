"use strict";

let from = 5;

function redirect(id) {
    let elem = document.getElementById(id);

    const interval = setInterval(() => {
        elem.innerHTML = String(from);
        from -= 1;

    }, 1000);

    if (from === 0) {
        clearInterval(interval);
    }
}
