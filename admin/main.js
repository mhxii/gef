"use strict";
(function () {
  window.addEventListener("load",init);
  function init() {
    showMessage();
    getElement(".col.playerDispo").addEventListener('click',showPlayerDispo);
    getElement(".col.message").addEventListener('click',showMessage);
    getElement(".col.entraineur").addEventListener('click',showEntraineur);
  }

  function showPlayerDispo() {
    blockAllStatus();
    getElement('.status-row.playerList').style.display='block';
  }

  function showEntraineur() {
    blockAllStatus();
   getElement('.status-row.entraineur').style.display='block';
  }

  function showMessage() {
    blockAllStatus();
   getElement('.status-row.message').style.display='block';
  }

  function blockAllStatus() {
    let statusRow=qsa('.status-row');
    for (let index = 1; index < statusRow.length; index++) {
      statusRow[index].style.display="none";
      
    }
  }

  function qsa(e) {
    return document.querySelectorAll(e);
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