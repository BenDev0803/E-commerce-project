//EVENTO AL CLICK 

let searchBar = document.querySelector("#searchBar");
let button= document.querySelector("#button");
let confirmed=false;

button.addEventListener("click" , ()=>
{
    if(confirmed==false)
    {
        searchBar.classList.remove("d-none")
        confirmed=true;
    }else{
        searchBar.classList.add("d-none");
        confirmed=false;
    }
});

// EVENTI ALLO SCROLL
let scrollBtn = document.querySelector("#scrollBtn");
document.addEventListener("scroll", ()=>
{

    let scrolled = window.scrollY;
    if(scrolled >= 150)
    {
        scrollBtn.classList.remove("d-none");
    }else{
        scrollBtn.classList.add("d-none");
    }
});

//===== Preloader
window.onload = function () 
{
    window.setTimeout(fadeout, 500);
}

function fadeout() 
{
    document.querySelector('.preloader').style.opacity = '0';
    document.querySelector('.preloader').style.display = 'none';
}

// js counters
function counters() 
{
    let recensioniPositive = document.querySelector('#recensioniPositive');
    let recensioniPositiveCounter = 0;
    let recensioniPositiveInterval = setInterval(() => 
    {
        recensioniPositiveCounter++
        recensioniPositive.innerHTML = `${recensioniPositiveCounter}`;
        if (recensioniPositiveCounter > 367)
        {
            clearInterval(recensioniPositiveInterval);
        }
    }, 0.3);

    let prodottiVendutiCounter = 300;
    let prodottiVenduti = document.querySelector('#prodottiVenduti');
    let prodottiVendutiinterval = setInterval(() => 
    {
        prodottiVendutiCounter++
        prodottiVenduti.innerHTML = `${prodottiVendutiCounter}`;
        
        if(prodottiVendutiCounter > 1259)
        {
            clearInterval(prodottiVendutiinterval);
        }
    }, 0.07);

    let annunciInseritiCounter = 0;
    let annunciInseriti = document.querySelector('#annunciInseriti');
    let annunciInseritiInterval = setInterval(() => 
    {
        annunciInseritiCounter++
        annunciInseriti.innerHTML = `${annunciInseritiCounter}`;
        if(annunciInseritiCounter > 452)
        {
            clearInterval(annunciInseritiInterval);
        }
    }, 0.2);
}    

let confirm = true;

document.addEventListener('scroll', ()=> 
{
    if(window.scrollY > 700 && confirm == true)
    {
    counters();
    confirm = false;
    }
});

