// js/script.js

let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("slides");
    for(i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slideIndex++;
    if(slideIndex > slides.length){
        slideIndex = 1
    }    
    slides[slideIndex-1].style.display = "block";  
    setTimeout(showSlides, 5000); // Change image every 5 seconds
}

function plusSlides(n){
    let slides = document.getElementsByClassName("slides");
    slideIndex += n;
    if(slideIndex > slides.length){
        slideIndex = 1;
    } else if(slideIndex < 1){
        slideIndex = slides.length;
    }
    for(let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slides[slideIndex-1].style.display = "block";  
}

