const cursor = document.querySelector('#cursor'),
        html = document.querySelector('html');
html.addEventListener('mousemove', function(event){
    setTimeout(function(){
    let x = event.clientX;
    let y = event.clientY;
    cursor.style.left = `${x}px`;
    cursor.style.top = `${y}px`;
    }, 100);
});




