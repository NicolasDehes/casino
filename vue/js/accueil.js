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
    minDisplay.innerText = min;

    const maxDisplay = document.createElement('p');
    maxDisplay.classList.add('home-solde__info');
    maxDisplay.innerText = max == "" ? 'Aucune limite' : max;

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
    minInput.type = 'number';
    minInput.name = 'minimum';
    minInput.required = true;
    minInput.value = min;

    const maxInput = document.createElement('input');
    maxInput.classList.add('input');
    maxInput.classList.add('input--solde');
    maxInput.type = 'number';
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
            var formData = new FormData();
            formData.append('id', parent.dataset.id);
            formData.append('min', minInput.value);
            formData.append('max', maxInput.value);
            fetch(`../api/admin.php?action=updateGameById`, {
                method: 'POST',
                body: formData,
            })
                .then((data) => data.json())
                .then((data) => {
                    parent.dataset.min = data.min;
                    parent.dataset.max = data.max;
                    homeSoldeDoubleInput.remove();
                    homeSoldeModifier.remove();
                    affichageMise(parent);
                });
        } else {
            minInput.reportValidity();
            maxInput.reportValidity();
        }
    });

    parent.appendChild(homeSoldeDoubleInput);
    parent.appendChild(homeSoldeModifier);
}
