import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

// toast
const toastCont = document.querySelector(".toast-container");
const toastLiveExample = document.getElementById("liveToast");

if (toastCont) {
    const toastBootstrap =
        bootstrap.Toast.getOrCreateInstance(toastLiveExample);
    toastBootstrap.show();
}
