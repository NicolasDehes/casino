function modifyMise(id){
    card = document.getElementById('jeux-'+id); 
    
    // Supp value mise min et max 
    cardContaine = document.querySelectorAll(`#jeux-${id} .home-solde__info`); 
    cardContaine.forEach(element => element.remove() );

    document.querySelector(`#jeux-${id} .home-solde__modifier`).remove(); 
    

    div = document.createElement('div'); 
    div.className = 'home-solde__double'; 

    inputMin = document.createElement('input'); 
    inputMin.id = 'min'; 
    inputMin.type = 'number';
    div.append(inputMin);  

    inputMax = document.createElement('input'); 
    inputMax.id = 'max'; 
    inputMax.type = 'number';
    div.append(inputMax);  


    card.append(div);
}