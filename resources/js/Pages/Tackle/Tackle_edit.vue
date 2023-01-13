<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectMaker from '@/Components/SelectMaker.vue';
import SelectGenre from '@/Components/SelectGenre.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link, useForm, usePage } from '@inertiajs/inertia-vue3';
import UserLayout from '@/Components/UserLayout.vue';
import { ref } from 'vue';
import img from '@/images/tackle_edit.png';

const props = defineProps({
    mustVerifyEmail: Boolean,
    status:String,
});

const tackle = usePage().props.value.tackles;

const form = useForm({
    tackle_name: tackle.tackle_name,
    maker_name: tackle.maker_name,
    genre_name: tackle.genre_name,
    amount: tackle.amount,
    purchase_date: tackle.purchase_date,
    purchase_fee: tackle.purchase_fee,
    detailed_info: tackle.detailed_info,
    tackle_photo: tackle.tackle_photo,
    tacklePhoto: null,
    stock_check: tackle.stock_check,
    fish_category: tackle.fish_category,
    size: tackle.size,
    weight: tackle.weight,
    condition: tackle.condition,
    fishing_date: tackle.fishing_date,
    fishingResult_photo: tackle.fishingresult_photo,
    fishingPhoto: null,
    share_stock: tackle.share_stock,
});
</script>

<template>
  <img src="../images/tackle_edit.png" alt="" class="tackle_edit-img" />
  <section>
    <UserLayout>
        <h1>タックル情報</h1>

        <form @submit.prevent="form.post(route('tackle.update', tackle.id))" class="mt-6 space-y-6">       <!-- idパラメータ -->
          <div id="tackleform">
            <div class="tackleinfo">
            <div class="info">
                <div class="photo">
                    <span v-if="form.tackle_photo">
                        <img :src="form.tackle_photo">
                    </span>
                    <span v-else>
                        <img src="../images/20200504_noimage.png">
                    </span>
                    <input
                        id="tacklePhoto"
                        @input="form.tacklePhoto = $event.target.files[0]"
                        type="file"
                    />

                    <div v-if="form.errors.tacklePhoto">
                        {{ form.errors.tacklePhoto }}
                    </div>
                </div>
                <div>
                <InputLabel for="tackle_name" value="タックル名" />

                <TextInput
                    id="tackle_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.tackle_name"
                    required
                    autofocus
                    autocomplete="tackle_name"
                />

                <InputError class="mt-2" :message="form.errors.tackle_name" />
                </div>

                <div>
                <InputLabel for="maker_name" value="メーカー名" />

                <SelectMaker
                    id="maker_name"
                    class="mt-1 block w-full"
                    v-model="form.maker_name"
                    :value="form.maker_name"
                    required
                    autofocus
                    autocomplete="maker_name"
                />

                <InputError class="mt-2" :message="form.errors.maker_name" />
                </div>
                <div>
                <InputLabel for="genre_name" value="ジャンル名" />

                <SelectGenre
                    id="genre_name"
                    class="mt-1 block w-full"
                    v-model="form.genre_name"
                    :value="form.genre_name"
                    required
                    autofocus
                    autocomplete="genre_name"
                />

                <InputError class="mt-2" :message="form.errors.genre_name" />
                </div>
                <div>
                <InputLabel for="amount" value="数量" />

                <TextInput
                    id="amount"
                    type="integer"
                    class="mt-1 block w-full"
                    v-model="form.amount"
                    required
                    autofocus
                    autocomplete="amount"
                />

                <InputError class="mt-2" :message="form.errors.amount" />
                </div>
                <div>
                <InputLabel for="purchase_date" value="購入日" />

                <TextInput
                    id="purchase_date"
                    type="date"
                    class="mt-1 block w-full"
                    v-model="form.purchase_date"
                    autofocus
                    autocomplete="purchase_date"
                />

                <InputError class="mt-2" :message="form.errors.purchase_date" />
                </div>
                <div>
                <InputLabel for="purchase_fee" value="購入金額" />

                <TextInput
                    id="purchase_fee"
                    type="integer"
                    class="mt-1 block w-full"
                    v-model="form.purchase_fee"
                    required
                    autofocus
                    autocomplete="purchase_fee"
                    style="width:12rem;"
                />
                <span style="padding-left: 0.1rem;">円</span>

                <InputError class="mt-2" :message="form.errors.purchase_fee" />
                </div>
                <div>
                <InputLabel for="detaled_info" value="詳細情報" />

                <TextInput
                    id="detaild_info"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.detailed_info"
                    autofocus
                    autocomplete="detailed_info"
                />

                <InputError class="mt-2" :message="form.errors.detailed_info" />
                </div>

                <div>
                <InputLabel for="stock_check" value="在庫がなければチェック" />

                <input
                id="stock_check"
                type="checkbox"
                :true-value="1"
                :false-value="0"
                v-model="form.stock_check"
                />
                </div>
            </div>
        </div>



        <h1>釣果情報</h1>
        <div class="fishinfo">
        <div class="info">
            <div class="photo">
                <span v-if="form.fishingResult_photo">
                    <img :src="form.fishingResult_photo">
                </span>
                <span v-else>
                        <img src="../images/20200504_noimage.png">
                </span>
                <input
                    id="fishingPhoto"
                    @input="form.fishingPhoto = $event.target.files[0]"
                    type="file"
                />

                <div v-if="form.errors.fishingPhoto">
                    {{ form.errors.fishingPhoto }}
                </div>
            </div>
            <div>
                <InputLabel for="fish_category" value="魚種" />

                <TextInput
                    id="fish_category"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.fish_category"
                    required
                    autofocus
                    autocomplete="fish_category"
                />

                <InputError class="mt-2" :message="form.errors.fish_category" />
            </div>
            <div>

                <InputLabel for="size" value="サイズ" />
            <TextInput
                    id="size"
                    type="integer"
                    class="mt-1 block w-full"
                    v-model="form.size"
                    autofocus
                    autocomplete="size"
                    style="width:12rem;"
                />
                <span style="padding-left: 0.05rem;">cm</span>

                <InputError class="mt-2" :message="form.errors.size" />
            </div>
            <div>

                <InputLabel for="weight" value="重さ" />
            <TextInput
                    id="weight"
                    type="integer"
                    class="mt-1 block w-full"
                    v-model="form.weight"
                    autofocus
                    autocomplete="weight"
                    style="width:12rem;"
                />
                <span style="padding-left: 0.1rem;">g</span>

                <InputError class="mt-2" :message="form.errors.weight" />
            </div>
            <div>

                <InputLabel for="condition" value="コンディション"/>
            <TextInput
                    id="condition"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.condition"
                    autofocus
                    autocomplete="condition"
                    style="  margin-bottom: 1rem;"
                />

                <InputError class="mt-2" :message="form.errors.condition" />
            </div>
            <div>

                <InputLabel for="fishing_date" value="釣れた日" />
            <TextInput
                id="fishing_date"
                type="date"
                class="mt-1 block w-full"
                v-model="form.fishing_date"
                autofocus
                autocomplete="fishing_date"
            />

                <InputError class="mt-2" :message="form.errors.fishing_date" />
            </div>

            <div>
                <InputLabel for="share_stock" value="シェアする場合はチェック" />

                <input
                id="share_stock"
                name="accepted"
                type="checkbox"
                :true-value="1"
                :false-value="0"
                v-model="form.share_stock" />
            </div>
        </div>
        </div>

            <div class="updateButton">
                <PrimaryButton 
                :must-verify-email="mustVerifyEmail" 
                :status="status" 
                :disabled="form.processing"
                >更新
                </PrimaryButton>

                <PrimaryButton
                method="delete"
                :href="route('tackle.delete',tackle.id)" preserve-scroll 
                class="border border-red-400 m-1 p-1 text-sm text-red-400"
                style="background-color:#fd0606; ">
                タックル削除
                </PrimaryButton>
            </div>


        </div>
        </form>
    </UserLayout>
  </section>
</template>