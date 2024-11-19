document.addEventListener("scroll" , 
function() {
    const scrollingFigure = 
    document.getElementById("scrollingFigure");
    const scrollY = window.scrollY;


    scrollingFigure.style.transform = 
    'translate(-50%, calc(-50% + ${scrollY * 0.5}px))';

});