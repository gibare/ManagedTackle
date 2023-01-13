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
              <div v-if="tackle.tackle_photo" class="sharePhoto">
                <img :src="tackle.tackle_photo" alt="" @click="countUp">
              </div>
              <div v-else class="sharePhoto">
                <img src="@/Pages/images/20200504_noimage.png" alt="">
              </div>
                <div>
                  <p>タックル名</p>
                  <p>{{ tackle.tackle_name }}</p>
                </div>
                <div>
                  <p>メーカー名</p>
                  <p>{{ tackle.maker_name }}</p>
                </div>
                <div>
                  <p>購入金額</p>
                  <p>{{ tackle.purchase_fee }}円</p>
                </div>
                <div>
                  <p>詳細情報</p>
                  <p>{{ tackle.detailed_info }}</p>
                </div>
              </div>

              <div class="fishingShare">
              <div v-if="tackle.fishingresult_photo" class="sharePhoto">
                <img :src="tackle.fishingresult_photo" alt="">
              </div>
              <div v-else class="sharePhoto">
                <img src="@/Pages/images/20200504_noimage.png" alt="">
              </div>
                <div>
                  <p>魚種</p>
                  <p>{{ tackle.fish_category }}</p>
                </div>
                <div>
                  <p>サイズ</p>
                  <p>{{ tackle.size }}</p>
                </div>
                <div>
                  <p>コンディション</p>
                  <p>{{ tackle.condition }}</p>
                </div>
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