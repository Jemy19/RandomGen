const gnrtbtn = document.querySelector(".gnrtbtn");

gnrtbtn.addEventListener("click", gnrtrdmnum);

function gnrtrdmnum(){
    const min = document.querySelector("#min").value;
    const max = document.querySelector("#max").value;

    rdmnum = Math.floor(Math.random()*parseInt(max)+ 1);
    
    if (rdmnum >= parseInt(min)){
        console.log(rdmnum);
        const generated = document.querySelector(".generated");
        generated.innerHTML = rdmnum;
    }
}



