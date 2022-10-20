window.addEventListener('load', () => {
    const homeSoldeElements = document.querySelectorAll('.home-solde__container');
    homeSoldeElements.forEach((element) => {
        affichageMise(element);
    });
});

function affichageMise(parent) {
    // fetch API pour récupérer les données
    const id = parent.dataset.id;
    const min = 0; // TODO a changer
    const max = 100; // TODO a changer

    const homeSoldeDoubleValues = document.createElement('div');
    homeSoldeDoubleValues.classList.add('home-solde__double');

    const minDisplay = document.createElement('p');
    minDisplay.classList.add('home-solde__info');
    minDisplay.innerText = min ?? "Aucune";

    const maxDisplay = document.createElement('p');
    maxDisplay.classList.add('home-solde__info');
    maxDisplay.innerText = max ?? "Aucune";

    homeSoldeDoubleValues.appendChild(minDisplay);
    homeSoldeDoubleValues.appendChild(maxDisplay);

    const homeSoldeModifier = document.createElement('p');
    homeSoldeModifier.classList.add('home-solde__modifier');
    homeSoldeModifier.innerText = "Modifier";
    homeSoldeModifier.addEventListener('click', () => {
        homeSoldeDoubleValues.remove();
        homeSoldeModifier.remove();
        editerMise(parent);
    });

    parent.appendChild(homeSoldeDoubleValues);
    parent.appendChild(homeSoldeModifier);
}

function editerMise(parent) {
    // fetch API pour récupérer les données
    const id = parent.dataset.id;
    const min = 0; // TODO a changer
    const max = 100; // TODO a changer

    const homeSoldeDoubleInput = document.createElement('div');
    homeSoldeDoubleInput.classList.add('home-solde__double');

    const minInput = document.createElement('input');
    minInput.classList.add("input");
    minInput.classList.add("input--solde");
    minInput.name = "minimum";
    minInput.value = min;

    const maxInput = document.createElement('input');
    maxInput.classList.add("input");
    maxInput.classList.add("input--solde");
    maxInput.name = "maximum";
    maxInput.value = max;

    homeSoldeDoubleInput.appendChild(minInput);
    homeSoldeDoubleInput.appendChild(maxInput);
    
    const homeSoldeModifier = document.createElement('p');
    homeSoldeModifier.classList.add('home-solde__modifier');
    homeSoldeModifier.innerText = "Confirmer";
    homeSoldeModifier.addEventListener('click', () => {
        // fetch API pour envoyer les données
        homeSoldeDoubleInput.remove();
        homeSoldeModifier.remove();
        affichageMise(parent);
    });

    parent.appendChild(homeSoldeDoubleInput);
    parent.appendChild(homeSoldeModifier);
}