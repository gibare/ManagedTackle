<script setup>
import UserLayout from '../Components/UserLayout.vue';
import { Link, useForm, usePage } from '@inertiajs/inertia-vue3'

import SelectMaker from '@/Components/SelectMaker.vue';
import { ref } from 'vue';

const props = defineProps({
  tackles: Array,
  user: String,
})

const searchWord = ref(['']);

const goodUser = props.user;

</script>

<template>
  <img src="./images/tackle_share.png" alt="" class="share-img">

  <UserLayout>
    <h1>みんなのタックル</h1>
    <div class="search">
    <SelectMaker
    name="search"
    v-model="searchWord"
    />
    <a
    method="get"
    :href="route('share.search', {queryWord: searchWord})"
    class="search_image"
    preserve-state
    />
</div>

    <section>
      <div class="ourTackle">
          <ul>
            <li v-for="tackle in tackles"
            :key="tackle.id"
            >
            <div id="share_info">
            <div class="tackleShare">
              <div class="ourPhoto">
              <div v-if="tackle.tackle_photo">
                <img :src="tackle.tackle_photo" alt="" @click="countUp">
              </div>
              <div v-else class="sharePhoto">
                <img src="@/Pages/images/20200504_noimage.png" alt="">
              </div>
              <div v-if="tackle.fishingresult_photo">
                <img :src="tackle.fishingresult_photo" alt="">
              </div>
              <div v-else class="sharePhoto">
                <img src="@/Pages/images/20200504_noimage.png" alt="">
              </div>
            </div>
                  <table>
                    <tr>
                      <th>タックル名</th>
                      <th>{{ tackle.tackle_name }}</th>
                      <th>魚種</th>
                      <th>{{ tackle.fish_category }}</th>
                    </tr>
                    <tr>
                      <th>メーカー名</th>
                      <th>{{ tackle.maker_name }}</th>
                      <th>サイズ</th>
                      <th>{{ tackle.size }}</th>
                    </tr>
                    <tr>
                      <th>購入金額</th>
                      <th>{{ tackle.purchase_fee }}円</th>
                      <th>コンディション</th>
                  <th>{{ tackle.condition }}</th>
                    </tr>
                    <tr>
                      <th>詳細情報</th>
                      <th>{{ tackle.detailed_info }}</th>
                    </tr>
                    <tr>
                      
                    </tr>
                  </table>
              </div>

              <div class="goodAction">
                <p v-if="tackle.goodsuser_id == goodUser">
                    <Link
                    :href="route('good.goodAdd', tackle)" 
                    method="post"
                    as="button" type="button"

                    >
                </Link>
                <span>
                    {{ tackle.goods_count }}
                </span>
                  </p>
              </div>
            </div>
            </li>
          </ul>
      </div>
    </section>
  </UserLayout>
</template>