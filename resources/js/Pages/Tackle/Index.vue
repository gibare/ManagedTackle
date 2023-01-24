<script setup>
import { InertiaLink } from '@inertiajs/inertia-vue3' 
import UserLayout from '@/Components/UserLayout.vue'
import { ref } from 'vue';
import { Link, useForm, usePage } from '@inertiajs/inertia-vue3'
import img from '@/Pages/images/tackle.png'

const props = defineProps({
  tackles: Array,
});

</script>

<template>
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>マイタックル</title>
        <meta name="description" content="タックルを新規登録・編集します。">
    </head>
  <img src="@/Pages/images/tackle.png" alt="" class="tackle-img" />
  <section>
    <UserLayout>
        <h1>マイタックル</h1>
        <div id="add_tackle">
          <button onclick="location.href='/add_tackle'" style="background:#CEC9C9; color:black; font-weight: 400;">タックル追加</button>
        </div>
        <ul>
          <li v-for="tackle in tackles" class="list-none flex justify-between"
          :key="tackle.id">
          <div v-if="tackle.stock_check">
            <a :href="`tackle_edit/${tackle.id}`" target=_blank class="text-blue-700" 
            style="color: #CEC9C9;">
              {{ tackle.tackle_name }}
            </a>
          </div>
          <div v-else>
            <a :href="`tackle_edit/${tackle.id}`" target=_blank class="text-blue-700">
              {{ tackle.tackle_name }}
            </a>
          </div>
          </li>
        </ul>
    </UserLayout>
  </section>
</template>