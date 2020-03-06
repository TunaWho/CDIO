document.addEventListener('DOMContentLoaded', function(){
    const btn = document.getElementById('btn');
    const logout = document.querySelector('.logout');
    const form_lg = document.querySelectorAll('.sign-in');
    const login = document.querySelector('.log-in');
    const content = document.querySelector('.form');
    const bg = document.querySelector('.blackground');
    const close = document.querySelector('.close');

    login.onclick = () => {
        form_lg[0].classList.add('active');
        content.classList.add('show2');
        bg.classList.add('active');
    }
    close.onclick = function(){
        form_lg[0].classList.remove('active');
        content.classList.remove('show2');
        bg.classList.remove('active');
    }
    btn.onclick = function(){
        logout.classList.toggle('show');
    }
    
}, false);