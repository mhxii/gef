// Sélectionner tous les éléments div avec la classe "col"

const statusRow = document.querySelector('.row.status-row.content');
// const cols = document.querySelectorAll('.col.player');

// // Sélectionner l'élément div avec la classe "row status-row"

// // Ajouter un écouteur d'événement "click" à chaque div ".col"
// cols.forEach(col => {
//   col.addEventListener('click', () => {
//     // Récupérer le contenu HTML de la div ".col" cliquée
//     const content = col.innerHTML;

//     // Effacer le contenu actuel de la div ".row.status-row"

//     // Créer un nouvel élément div pour afficher le contenu
//     const contentDiv = document.createElement('div');
//     contentDiv.innerHTML = content;

//     // Ajouter le nouvel élément div à la div ".row.status-row"
//     statusRow.appendChild(contentDiv);
//   });
// });

// Tableau de joueurs disponibles
const players = [
    { name: 'John Doe', number: 10, position: 'Attaquant' },
    { name: 'Jane Smith', number: 7, position: 'Milieu' },
    { name: 'Bob Johnson', number: 3, position: 'Défenseur' },
    { name: 'Samantha Lee', number: 22, position: 'Gardien' },
    // Ajoutez d'autres joueurs ici
  ];
  
  // Fonction pour générer une ligne de tableau pour un joueur
  function createPlayerRow(player) {
    

    const row = document.createElement('div');
    row.classList.add('row', 'mb-3');
  
    const nameCol = document.createElement('div');
    nameCol.classList.add('col-3');
    nameCol.textContent = player.name;
    row.appendChild(nameCol);
  
    const numberCol = document.createElement('div');
    numberCol.classList.add('col-2');
    numberCol.textContent = player.number;
    row.appendChild(numberCol);
  
    const positionCol = document.createElement('div');
    positionCol.classList.add('col-4');
    positionCol.textContent = player.position;
    row.appendChild(positionCol);
  
    const actionsCol = document.createElement('div');
    actionsCol.classList.add('col-3');
    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Supprimer';
    deleteButton.classList.add('btn', 'btn-danger', 'btn-sm', 'mr-2');
    deleteButton.addEventListener('click', () => removePlayer(player));
    actionsCol.appendChild(deleteButton);
  
    const editButton = document.createElement('button');
    editButton.textContent = 'Modifier';
    editButton.classList.add('btn', 'btn-primary', 'btn-sm');
    editButton.addEventListener('click', () => editPlayer(player));
    actionsCol.appendChild(editButton);
  
    row.appendChild(actionsCol);
  
    return row;
  }
  
  // Fonction pour supprimer un joueur
  function removePlayer(player) {
    // Logique pour supprimer le joueur de la base de données ou du tableau
    console.log(`Supprimer le joueur ${player.name}`);
    // Après la suppression, vous pouvez actualiser la liste des joueurs
  }
  
  // Fonction pour modifier un joueur
  function editPlayer(player) {
    // Logique pour ouvrir un formulaire de modification du joueur
    console.log(`Modifier le joueur ${player.name}`);
  }
  
  // Récupérer l'élément div où les lignes de joueurs seront insérées
  
  // Fonction pour afficher la liste des joueurs
  function showPlayerList() {
    // Effacer le contenu actuel de la div playerList
    const col12 = document.createElement('div');
    col12.classList.add('col-12');
    col12.id='playerList';
    
    statusRow.innerHTML = '';
    statusRow.appendChild(col12);
    
    const playerList = document.getElementById('playerList');
    playerList.innerHTML = '';
  
    // Afficher la div playerList
    playerList.style.display = 'block';
  
    // Générer les lignes de joueurs et les ajouter à la div playerList
    players.forEach(player => {
      const playerRow = createPlayerRow(player);
      playerList.appendChild(playerRow);
    });
  }
  
  // Sélectionner le div .col dédié aux joueurs disponibles
  const playerListTrigger = document.querySelector('.player-list-trigger');
  
  // Ajouter un écouteur d'événement "click" pour afficher la liste des joueurs
  playerListTrigger.addEventListener('click', showPlayerList);