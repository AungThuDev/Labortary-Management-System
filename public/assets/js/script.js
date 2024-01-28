window.addEventListener('scroll',function(){
    var element = document.querySelector('header');
    var scrollPosition = window.scrollY;
    const addressBar = this.document.getElementById('address-bar');
    const navbar = this.document.getElementById('nav-bar');
    if(scrollPosition > 200)
    {
        addressBar.classList.add('d-none');
        addressBar.classList.remove('d-md-flex');
        navbar.style.backgroundColor = '#21262b';
        navbar.style.paddingTop="1px";
        navbar.style.paddingBottom="1px";
        // navbar.style.marginTop = "0px";
        navbar.style.transition = "1s";
    }else{
        addressBar.classList.add('d-md-flex');
        addressBar.classList.remove('d-none');
        navbar.style.backgroundColor = '';
        // navbar.style.marginTop = "50px";
    }
});