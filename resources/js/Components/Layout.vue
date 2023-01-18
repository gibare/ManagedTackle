<template>
  <inertia-head  />
  <header class="bg-gray-100">
    <nav>
        <div id="tackle_home">
            <inertia-link href="/">TACKLE BOX</inertia-link>
        </div>
        <button
            v-show="buttonShow"
            class="menu-button"
            :class="{ open: menuOpen }"
            @click="menuOpen = !menuOpen"
            >
            <span class="menu-button__bar menu-button__bar--top"></span>
            <span class="menu-button__bar menu-button__bar--center"></span>
            <span class="menu-button__bar menu-button__bar--bottom"></span>
        </button>
    </nav>
        <transition name="fade">
        <nav v-show="menuOpen" class="nav" :class="{ 'sp-menu': buttonShow }">
            <ul class="nav__list">
            <li class="nav__item">
                <a href="/introduction" class="nav__link" style="color:#06fd8a;">アプリ紹介</a>
            </li>
            <li class="nav__item">
                <button onclick="location.href='/register'" class="nav__link_button">新規登録</button>
            </li>
            <li class="nav__item">
                <button onclick="location.href='/login'" type="button" class="nav__link">ログイン</button>
            </li>
            </ul>
        </nav>
        </transition>
  </header>
  <article>
      <slot />
  </article>

</template>

<script>
  import { InertiaLink, InertiaHead } from '@inertiajs/inertia-vue3';
  import LoginButton from '@/Components/LoginButton.vue';

  export default {
      components: {
          InertiaLink,
          InertiaHead,
          LoginButton,
      },
      props:{
          title: String 
      },
      data() {
        return {
        windowWidth: "",
        // menuOpenの真偽値はビューポート幅によるグローバルメニュー展開（v-show）と、
        // ハンバーガーメニュークリックによるグローバルメニュー展開（openクラスの付与）の両方で使用
        menuOpen: "",
        // buttonShowの真偽値はビューポート幅によるハンバーガーメニュー表示（v-show）と、
        // モバイル用のグローバルメニュー（sp-menuクラスの付与）の両方で使用
        buttonShow: ""
        };
            },
            methods: {
                getWindowWidth($event) {
                this.windowWidth = window.innerWidth;
                // 768px以上でtrue → menuを展開
                this.menuOpen = this.windowWidth >= 768;
                // 768px未満でtrue → menuボタンを表示
                this.buttonShow = this.windowWidth < 768;
                }
            },
            created() {
                // リサイズ時のイベントハンドラを登録
                window.addEventListener("resize", this.getWindowWidth);
            },
            beforeUnmount() {
                // リサイズ時のイベントハンドラを解除
                window.removeEventListener("resize", this.getWindowWidth);
            },
            mounted: function () {
                // ウィンドウ幅の初期値を設定
                this.getWindowWidth();
            }
  }
</script>