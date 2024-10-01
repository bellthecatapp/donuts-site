"use strict";

// buttonを取得
const top_btn = document.querySelector('.top_btn');
// スクロールでトップへ戻る
top_btn.addEventListener('click', () => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});

// footerを取得
const footer = document.querySelector("footer");
// windowの高さを取得
const window_height = window.innerHeight;
// ブラウザの上端からフッターまでの距離を取得
const distance = footer.offsetTop;

window.addEventListener('scroll', () => {
  // スクロールの高さを取得
  let scroll_Y = window.scrollY;
  if (scroll_Y >= 300) {
    // 300スクロールしたらボタン表示
    top_btn.classList.add('btn_active');
  } else {
    // topに戻ったら消える
    top_btn.classList.remove('btn_active');
  }
  // footer上部でボタンのスクロール止まる
  if (scroll_Y >= (distance - window_height)) {
    top_btn.classList.add('btn_absolute');
  } else {
    top_btn.classList.remove('btn_absolute');
  }
});