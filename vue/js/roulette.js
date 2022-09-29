const rouletteContainer = document.getElementById('roulette__container');
const rouletteForm = document.getElementById('roulette-form');
const win = document.getElementById('win');
const lose = document.getElementById('lose');
const rouletteResult = document.getElementById('roulette-result');
const solde = document.getElementById('solde');

rouletteForm.addEventListener('submit', onClickRoulette);

const retryBtn = document.getElementById('retry-btn');
retryBtn.addEventListener('click', onRetry);

function onRetry() {
    // Hide result
    rouletteResult.style.display = 'none';
    win.style.display = 'none';
    lose.style.display = 'none';

    // Show form
    rouletteForm.reset();
    rouletteForm.style.display = 'flex';
}

async function onClickRoulette(evt) {
    evt.preventDefault();

    const playBtn = document.getElementById('play-btn');
    playBtn.classList.add('button--disabled');

    const creditInput = document.getElementById('creditsInput');
    const mise = creditInput.value;

    solde.textContent = parseInt(solde.textContent) - parseInt(mise);

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

    // Changer ici la valeur de la rotation
    const nbSections = res.random;

    const nbTours = Math.floor(Math.random() * 10) + 2;

    const totalDeg = (nbSections + nbTours * 8) * 45; // 45 = 360/8

    rouletteContainer.style.transform = `rotate(${totalDeg + baseRotate}deg)`;

    setTimeout(() => {
        solde.textContent = res.newSolde;

        // Hide form
        rouletteForm.style.display = 'none';

        if (res.gain > 0) {
            win.style.display = 'block';
            // Update gains
            gains = document.getElementById('gain');
            gains.textContent = res.gain;
        } else {
            lose.style.display = 'block';
            // Update perte
            perte = document.getElementById('perte');
            perte.textContent = Math.abs(res.gain);
        }

        // Show result
        rouletteResult.style.display = 'block';

        playBtn.classList.remove('button--disabled');

        creditInput.setAttribute('max', res.newSolde);

    }, 3000); // Await transition roulette
}
