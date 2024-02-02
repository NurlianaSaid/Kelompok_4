
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


