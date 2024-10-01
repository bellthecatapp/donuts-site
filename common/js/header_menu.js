'use strict';

const hammenu = document.querySelector('.hammenu_contents');
const openButton = document.getElementById('open_button');
const closeButton = document.getElementById('hammenu_close_icon');
// 画面サイズ変更時の挙動修正

function handle() {
  if (window.matchMedia('(min-width: 768px)'.matches)) {
    openButton.onclick = function () {
      hammenu.style.left = '0';
    }
    closeButton.onclick = function () {
      hammenu.style.left = '-100vw';
    }

  } else {
    openButton.onclick = function () {
      hammenu.style.left = '0';
    }
    closeButton.onclick = function () {
      hammenu.style.left = '-100vw';
    }
  }
}

window.onload = handle;
window.onresize = handle;