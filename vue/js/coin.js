const win = document.getElementById('win');
const lose = document.getElementById('lose');
const tossForm = document.getElementById("toss-form")
const solde = document.getElementById('solde');
const tossResult = document.getElementById("toss-result")
const duration = 3000;


tossForm.addEventListener('submit', toss);


const retryBtn = document.getElementById('retry-btn');
retryBtn.addEventListener('click', onRetry);

function onRetry() {
  // Hide result
  tossResult.style.display = 'none';
  win.style.display = 'none';
  lose.style.display = 'none';

  // Show form
  tossForm.reset();
  tossForm.style.display = 'block';
}

async function toss(event) {
  event.preventDefault()

  const coin = document.getElementById("coin");
  coin.style.animation = "none";

  const playBtn = document.getElementById('play-btn');
  playBtn.classList.add('button--disabled');

  const creditInput = document.getElementById('creditsInput');
  const mise = creditInput.value;

  solde.textContent = parseInt(solde.textContent) - parseInt(mise);

  var formData = new FormData();
  formData.append('idUser', 1);
  formData.append('mise', mise);


  const res = await fetch('../api/pileouface.php', {
    method: 'POST',
    body: formData,
  }).then((data) => data.json());
  //console.log(res);

  const winRes = res.result;
  const isCurentHead = document.querySelector('input[name="pileouface"]:checked').value == 0;

  if ((isCurentHead && winRes) || (!winRes && !isCurentHead)) { // HEAD
    coin.style.animation = `flip-tails ${duration}ms forwards`;

  } else { // TAIL
    coin.style.animation = `flip-heads ${duration}ms forwards`;

  }
  setTimeout(() => {
    tossResult.style.display = 'block';
    solde.textContent = res.newSolde;
    // Hide form
    tossForm.style.display = 'none';
    console.log(res);
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
    tossResult.style.display = 'block';

  

    playBtn.classList.remove('button--disabled');

    


    creditInput.setAttribute('max', res.newSolde);

  }, duration);


}