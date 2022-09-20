const rouletteContainer = document.getElementById("roulette__container");
const rouletteBtn = document.getElementById("roulette__btn");
rouletteBtn.addEventListener("click", onClickRoulette);

function onClickRoulette() {
    // TODO changer ici la valeur de la rotation
    const nbSections = 2;
    
    const nbTours = Math.floor(Math.random() * 10) + 1;
    
    const totalDeg = (nbSections+nbTours*8)*45; // 45 = 360/8

    rouletteContainer.style.transform = `rotate(${totalDeg+22.5}deg)`;
  }