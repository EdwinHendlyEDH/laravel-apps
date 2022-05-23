window.onscroll = function(){
    const nav = document.querySelector('#nav');
    const navToTop = nav.offsetTop;

    if (window.pageYOffset > navToTop){
        nav.classList.add('fixed-nav');
    }else{
        nav.classList.remove('fixed-nav');
    }
}