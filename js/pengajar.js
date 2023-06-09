const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li')

    burger.addEventListener('click',()=>{
        nav.classList.toggle('nav-active');
        
        
        navLinks.forEach((link, pengajar)  => {
        if (link.style.animation) {
            link.style.animation = '';
        } else{
            link.style.animation = `navLinkFade 0.5s ease forwards ${pengajar / 7 + 0.4}s`
        }
    });
    burger.classList.toggle('toggle');
    });

    
}

navSlide();