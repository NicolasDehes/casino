const rouletteContainer = document.getElementById('roulette__container');
const rouletteForm = document.getElementById('roulette-form');
rouletteForm.addEventListener('submit', onClickRoulette);

async function onClickRoulette(evt) {
    evt.preventDefault();

    const mise = document.getElementById('creditsInput').value;

    var formData = new FormData();
    formData.append('idUser', 1);
    formData.append('mise', mise);

    const res = await fetch('/casino/api/roulette.php', {
        method: 'POST',
        body: formData,
    }).then((data) => data.json());

    const width = window.innerWidth;
    let baseRotate = 22.5;
    if (width >= 600) {
        baseRotate = -67.5;
    }

    // TODO changer ici la valeur de la rotation
    const nbSections = res.random;

    console.log(nbSections);

    const nbTours = Math.floor(Math.random() * 10) + 1;

    const totalDeg = (nbSections + nbTours * 8) * 45; // 45 = 360/8

    rouletteContainer.style.transform = `rotate(${totalDeg + baseRotate}deg)`;
}
