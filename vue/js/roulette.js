const rouletteContainer = document.getElementById("roulette__container");
// TODO : A changer pour déclancher la rotation
const rouletteBtn = document.getElementById("roulette__btn");
rouletteBtn.addEventListener("click", onClickRoulette)

function onClickRoulette() {
  const width = window.innerWidth;
  let baseRotate = 22.5;
  if (width >= 600) {
    baseRotate = -67.5;
  }

    // TODO changer ici la valeur de la rotation
    const nbSections = 2;
    
    const nbTours = Math.floor(Math.random() * 10) + 1;
    
    const totalDeg = (nbSections+nbTours*8)*45; // 45 = 360/8

    rouletteContainer.style.transform = `rotate(${totalDeg+baseRotate}deg)`;
  }