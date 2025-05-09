'use strict';
const $navbar = document.querySelector("[data-navbar]");
const $navToggler = document.querySelector("[data-nav-toggler]");

$navToggler.addEventListener("click", () => {
    $navbar.classList.toggle("active");
    
    if ($navbar.classList.contains("active")) {
        $navbar.style.transition = "transform 0.3s ease-in-out";
    } else {
        $navbar.style.transition = "transform 0.3s ease-in-out";
    }
});


const $header = document.querySelector("[data-header]");
const $logo = document.querySelector("[data-logo]"); 

const handleScroll = () => {
    if (window.scrollY > 50) {
        $header.classList.add("active");
        $logo.style.transform = "scale(0.8)"; 
        $header.style.boxShadow = "0 2px 10px rgba(0, 0, 0, 0.1)"; 
    } else {
        $header.classList.remove("active");
        $logo.style.transform = "scale(1)"; 
        $header.style.boxShadow = "none";
    }
};


let scrollTimeout;
window.addEventListener("scroll", () => {
    clearTimeout(scrollTimeout);
    scrollTimeout = setTimeout(handleScroll, 100);
});


const scrollLinks = document.querySelectorAll('a[href^="#"]');
scrollLinks.forEach(link => {
    link.addEventListener("click", (e) => {
        e.preventDefault();
        const target = document.querySelector(link.getAttribute('href'));
        window.scrollTo({
            top: target.offsetTop - $header.offsetHeight, 
            behavior: "smooth"
        });
    });
});


const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll("[data-nav-link]");

const highlightActiveLink = () => {
    let currentSection = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        if (window.scrollY >= sectionTop - $header.offsetHeight) {
            currentSection = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove("active");
        if (link.getAttribute('href').includes(currentSection)) {
            link.classList.add("active");
        }
    });
};

window.addEventListener("scroll", highlightActiveLink);


const $toggleBtns = document.querySelectorAll("[data-toggle-btn]");

$toggleBtns.forEach($toggleBtn => {
    $toggleBtn.addEventListener("click", () => {
        $toggleBtn.classList.toggle("activate");
    });
});
