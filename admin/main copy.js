"use strict";
(function () {
  window.addEventListener("load",init);
  function init() {
    getElement(".player-list-trigger").addEventListener('click',showPlayerList);
    getElement(".col.message").addEventListener('click',showMessage);
    getElement(".col.entraineur").addEventListener('click',showTrainer);
  }

  function showPlayerList() {
    // Effacer le contenu actuel de la div playerList
    // getElement('.status-row.message').style.display='none';
    const col12 = document.createElement('div');
    col12.classList.add('col-12');
    col12.id='playerList';
    
    getElement('.status-row.content').innerHTML = '';
    getElement('.status-row.content').appendChild(col12);
    
    const playerList = document.getElementById('playerList');
    playerList.innerHTML = '';
  
    // Afficher la div playerList
    playerList.style.display = 'block';
  
    // Générer les lignes de joueurs et les ajouter à la div playerList
    playersDispo.forEach(player => {
      const playerRow = createPlayerRow(player);
      playerList.appendChild(playerRow);
    });
    console.log(playerList);
  }

  function showTrainer() {
    // Effacer le contenu actuel de la div playerList
    // getElement('.status-row.message').style.display='none';
    const col12 = document.createElement('div');
    col12.classList.add('col-12');
    col12.id='trainerList';
    
    getElement('.status-row.content').innerHTML = '';
    getElement('.status-row.content').appendChild(col12);
    
    const trainerList = document.getElementById('trainerList');
    trainerList.innerHTML = '';
  
    // Afficher la div trainerList
    trainerList.style.display = 'block';
  
    // Générer les lignes de joueurs et les ajouter à la div trainerList
    trainers.forEach(trainer => {
      const trainerRow = createTrainerRow(trainer);
      trainerList.appendChild(trainerRow);
    });
  }

  function showMessage() {
    // getElement('.status-row.content').style.display='block';
    const col12 = document.createElement('ul');
    // col12.classList.add('col-12');
    col12.classList.add('message-list');
    getElement('.status-row.content').innerHTML = '';
    getElement('.status-row.content').appendChild(col12);

    getElement('.message-list').innerHTML='';
    getElement('.message-list').style.display='block';

    messages.forEach(message => {
      const messageItem = createMessageItem(message);
      getElement('.message-list').appendChild(messageItem);
    });
  }

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

  function createTrainerRow(trainer) {
    

    const row = document.createElement('div');
    row.classList.add('row', 'mb-3');
  
    const nameCol = document.createElement('div');
    nameCol.classList.add('col-3');
    nameCol.textContent = trainer.nom;
    row.appendChild(nameCol);
  
    const prenomCol = document.createElement('div');
    prenomCol.classList.add('col-2');
    prenomCol.textContent = trainer.prenom;
    row.appendChild(prenomCol);
  
    const roleCol = document.createElement('div');
    roleCol.classList.add('col-4');
    roleCol.textContent = trainer.role;
    row.appendChild(roleCol);
  
    const actionsCol = document.createElement('div');
    actionsCol.classList.add('col-3');
    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Supprimer';
    deleteButton.classList.add('btn', 'btn-danger', 'btn-sm', 'mr-2');
    deleteButton.addEventListener('click', () => removetrainer(trainer));
    actionsCol.appendChild(deleteButton);
  
    const editButton = document.createElement('button');
    editButton.textContent = 'Modifier';
    editButton.classList.add('btn', 'btn-primary', 'btn-sm');
    editButton.addEventListener('click', () => edittrainer(trainer));
    actionsCol.appendChild(editButton);
  
    row.appendChild(actionsCol);
  
    return row;
  }

  function createMessageItem(message) {
    const messageElement = document.createElement('li');
  messageElement.classList.add('message');

  const avatarElement = document.createElement('div');
  avatarElement.classList.add('avatar');
  const avatarIcon = document.createElement('i');
  avatarIcon.classList.add('fas', 'fa-user');
  avatarElement.appendChild(avatarIcon);
  messageElement.appendChild(avatarElement);

  const messageContentElement = document.createElement('div');
  messageContentElement.classList.add('message-content');
  const nameElement = document.createElement('h5');
  nameElement.textContent = message.name;
  messageContentElement.appendChild(nameElement);
  const messageTextElement = document.createElement('p');
  messageTextElement.textContent = message.message;
  messageContentElement.appendChild(messageTextElement);
  messageElement.appendChild(messageContentElement);

  const statusElement = document.createElement('div');
  statusElement.classList.add('status');
  const statusIcon = document.createElement('i');
  if (message.status === 'pending') {
    statusIcon.classList.add('fas', 'fa-spinner','fa-spin', 'text-danger');
  } else {
    statusIcon.classList.add('fas', 'fa-check-circle', 'text-success');
  }
  statusElement.appendChild(statusIcon);
  messageElement.appendChild(statusElement);

  const replyButton = document.createElement('button');
  replyButton.classList.add('btn', 'btn-primary', 'btn-sm', 'reply-btn');
  replyButton.textContent = 'Répondre';
  messageElement.appendChild(replyButton);

  return messageElement;
  }
  function getClass(e) {
    return document.getElementsByClassName(e);
  }

  function getElement(e){
    return document.querySelector(e)
  }

  function getId(e){
    return document.getElementById(e);
  }

  function get(params) {
    
  }
})();