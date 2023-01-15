<template>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ホーム</title>
        <meta name="description" content="TackleBoxは、釣りを愛するアングラ―の皆さんのタックル整理ツールです。">
    </head>
    <img src="./images/top.png" alt="" class="top-img" />
  <layout title="TACKLE BOX">

  </layout>
</template>

<script>
    import { InertiaLink } from '@inertiajs/inertia-vue3';
    import Layout from '@/Components/Layout.vue';
    import img from '@/images/top.png';

    export default {
        components: {
            InertiaLink,
            Layout,
        },
    }
</script>
