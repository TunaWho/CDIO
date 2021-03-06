document.addEventListener(
    "DOMContentLoaded",
    function () {
        const form = document.querySelectorAll(".sign-in");
        const login = document.querySelector(".log-in");
        const form_login = document.querySelector(".form");
        const bg = document.querySelector(".blackground");
        const close = document.querySelectorAll(".close");
        const rgt = document.getElementById("rgt");
        const form_rgt = document.querySelector(".form_rgt");
        const back = document.querySelector('.right');
        const header = document.querySelector('#header');
        let status = true;
        let nutClick = "";
        rgt.onclick = () => {
            form[0].classList.remove("active");
            form_login.classList.remove("show2");
            form[1].classList.add("active");
            form_rgt.classList.add("show2");
            bg.classList.add("active");
            nutClick = "rgt";
        };
        back.onclick = () => {
            form[0].classList.add("active");
            form_login.classList.add("show2");
            form[1].classList.remove("active");
            form_rgt.classList.remove("show2");
            nutClick = "login";
        };
        for (let i = 0; i < close.length; i++) {
            close[i].onclick = () => {
                if (nutClick == "login") {
                    form[i].classList.remove("active");
                    form_login.classList.remove("show2");
                } else {
                    form[i].classList.remove("active");
                    form_rgt.classList.remove("show2");
                }
                bg.classList.remove("active");
            }
        }

        window.addEventListener('scroll', function () {
            if (window.pageYOffset > 1 && status === true) {
                header.classList.add('scroll');
                status = false;
            } else if (window.pageYOffset < 1 && status === false) {
                header.classList.remove('scroll');
                status = true;
            }
        })
        login.onclick = () => {
            form[0].classList.add("active");
            form_login.classList.add("show2");
            bg.classList.add("active");
            nutClick = "login";
        };
    },
    false
);

