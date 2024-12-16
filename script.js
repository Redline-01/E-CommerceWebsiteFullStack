const scrollToTopButton = document.getElementById("scrollToTop");

window.onscroll = function () {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollToTopButton.classList.add("show"); 
    } else {
        scrollToTopButton.classList.remove("show");
    }
};

scrollToTopButton.addEventListener("click", function () {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});