function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

window.onscroll = () => {
    if (window.scrollY > 20) {
        document.getElementById("pageUpButton").style.display = "block";
    } else {
        document.getElementById("pageUpButton").style.display = "none";
    }
}

// Navbar bergerak
const nav = document.querySelector('nav');
window.addEventListener('scroll', function(){
    if(this.window.scrollY > 50 ){
    nav.classList.add('active');
    }else{
        nav.classList.remove('active');
    }
})



// pergantian warna
const toggleElement = document.querySelector('.toggle');
const bodyElement = document.querySelector('body');

toggleElement.addEventListener('click',function(){
 if(bodyElement.classList.contains('siang')){
    bodyElement.classList.remove('siang');
    bodyElement.classList.add('malam');

 }else{
    bodyElement.classList.remove('malam');
    bodyElement.classList.add('siang');
 }
});
