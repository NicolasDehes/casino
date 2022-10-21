window.addEventListener('load', () => {
    const homeSoldeElements = document.querySelectorAll(
        '.home-solde__container'
    );
    homeSoldeElements.forEach((element) => {
        affichageMise(element);
    });
});

function affichageMise(parent) {
    const min = parent.dataset.min;
    const max = parent.dataset.max;

    const homeSoldeDoubleValues = document.createElement('div');
    homeSoldeDoubleValues.classList.add('home-solde__double');

    const minDisplay = document.createElement('p');
    minDisplay.classList.add('home-solde__info');
    minDisplay.innerText = min ?? 'Aucune';

    const maxDisplay = document.createElement('p');
    maxDisplay.classList.add('home-solde__info');
    maxDisplay.innerText = max ?? 'Aucune';

    homeSoldeDoubleValues.appendChild(minDisplay);
    homeSoldeDoubleValues.appendChild(maxDisplay);

    const homeSoldeModifier = document.createElement('p');
    homeSoldeModifier.classList.add('home-solde__modifier');
    homeSoldeModifier.innerText = 'Modifier';
    homeSoldeModifier.addEventListener('click', () => {
        homeSoldeDoubleValues.remove();
        homeSoldeModifier.remove();
        editerMise(parent);
    });

    parent.appendChild(homeSoldeDoubleValues);
    parent.appendChild(homeSoldeModifier);
}

function editerMise(parent) {
    ///api/admin.php?action=updateGamebyId
    // post : min et max
    const min = parent.dataset.min;
    const max = parent.dataset.max;

    const homeSoldeDoubleInput = document.createElement('div');
    homeSoldeDoubleInput.classList.add('home-solde__double');

    const minInput = document.createElement('input');
    minInput.classList.add('input');
    minInput.classList.add('input--solde');
    minInput.min = 1;
    minInput.name = 'minimum';
    minInput.required = true;
    minInput.value = min;

    const maxInput = document.createElement('input');
    maxInput.classList.add('input');
    maxInput.classList.add('input--solde');
    maxInput.min = 1;
    maxInput.name = 'maximum';
    maxInput.value = max;

    homeSoldeDoubleInput.appendChild(minInput);
    homeSoldeDoubleInput.appendChild(maxInput);

    const homeSoldeModifier = document.createElement('p');
    homeSoldeModifier.classList.add('home-solde__modifier');
    homeSoldeModifier.innerText = 'Confirmer';
    homeSoldeModifier.addEventListener('click', () => {
        if (minInput.checkValidity() && maxInput.checkValidity()) {
            const id = parent.dataset.id;
            fetch(`../api/admin.php?action=updateGamebyId`, {
                method: 'POST',
                body: JSON.stringify({
                    id: id,
                    min: minInput.value,
                    max: maxInput.value,
                }),
            })
                .then((data) => data.json())
                .then((data) => {
                    parent.dataset.min = data.min;
                    parent.dataset.max = data.max;
                    homeSoldeDoubleInput.remove();
                    homeSoldeModifier.remove();
                    affichageMise(parent);
                });
        }
    });

    parent.appendChild(homeSoldeDoubleInput);
    parent.appendChild(homeSoldeModifier);
}
