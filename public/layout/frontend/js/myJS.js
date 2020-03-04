document.addEventListener('DOMContentLoaded', function(){
    const btn = document.getElementById('btn');
    const logout = document.querySelector('.logout');
    btn.onclick = function(){
        logout.classList.toggle('show');
    }
    
}, false)