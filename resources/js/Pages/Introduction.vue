<template>
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>アプリ紹介</title>
        <meta name="description" content="TackleBoxの目的についてご紹介します。">
    </head>
    <img src="./images/App_introduction.png" alt="" class="introduction-img" />
  <Layout title="アプリ紹介">

    <h1>アプリ紹介</h1>
    <div class="explanation">

    <p>釣り道具を管理するWEB上の管理ツールです。</p>

    <p>たとえば、こんな経験はありませんか？</p>

    <p>・釣りに出発したのはいいものの、
    「道具は全部揃っていたっけ？」</p>

    <p>・釣り具屋に来店したけど、
    「この道具って持っていた気がする…」</p>

    <p>釣りに出発する前の準備や、釣り具を購入する前の確認にぜひご利用ください。</p>
  </div>
</Layout>
</template>

<script>
    import { InertiaLink } from '@inertiajs/inertia-vue3'
    import Layout from '@/Components/Layout.vue';
    import img from '@/images/App_introduction.png'

    export default {
        components: {
            InertiaLink,
            Layout,
        },
        data() {
          return {
            display: true,
          }
        }
    }
</script>