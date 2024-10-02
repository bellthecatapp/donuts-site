"use strict";

const scroll_top = document.querySelector('.scroll_top');
// スクロールでトップへ戻る
scroll_top.addEventListener('click', () => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});

// buttonを取得
const top_btn = document.querySelector('.top_btn');
// footerを取得
const footer = document.querySelector("footer");
// windowの高さを取得
const window_height = window.innerHeight;

window.addEventListener('scroll', () => {
  // スクロールの高さを取得
  let scroll_Y = window.scrollY;
  if (scroll_Y >= 250) {
    // 250スクロールしたらボタン表示
    top_btn.classList.add('btn_active');
  } else {
    // topに戻ったら消える
    top_btn.classList.remove('btn_active');
  }
});