<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectMaker from '@/Components/SelectMaker.vue';
import SelectGenre from '@/Components/SelectGenre.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { InertiaLink, useForm, usePage } from '@inertiajs/inertia-vue3' 
import { ref } from 'vue';
import UserLayout from '@/Components/UserLayout.vue'
import img from '@/images/tackle_edit.png'


function submit() {
    form.post(route('tackle.create'));
}

const form = useForm({
    tackle_name: null,
    maker_name: null,
    genre_name: null,
    amount: null,
    purchase_date: null,
    purchase_fee: null,
    detailed_info: null,
    tacklePhoto: null,
    stock_check: null,
    fish_category: null,
    size: null,
    weight: null,
    condition: null,
    fishing_date: null,
    fishingPhoto: null,
    share_stock: null,
});

const previewtackle = ref('');
const tackleFile = (event) => {
    const file = event.target.files[0];
    previewtackle.value = URL.createObjectURL(file)
}

const previewFishing = ref('');
const fishingFile = (event) => {
    const file = event.target.files[0];
    previewFishing.value = URL.createObjectURL(file)
}
</script>

<template>
  <img src="../images/tackle_edit.png" alt="" class="tackle_edit-img" />
  <section>
    <UserLayout>
        <h1>タックル情報</h1>

        <form @submit.prevent="submit" class="mt-6 space-y-6">
          <div id="tackleform">
            <div class="tackleinfo">
                <div class="info">
                <div class="photo">
                <img v-if="previewtackle" :src="previewtackle" alt="">
                <img v-else src="../images/20200504_noimage.png" alt="">
                <input
                    id="tacklePhoto"
                    @input="form.tacklePhoto = $event.target.files[0]"
                    type="file"
                    @change="tackleFile"
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
                    :value="form.tackle_name"
                    required
                    autofocus
                    autocomplete="tackle_name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div>
                <InputLabel for="maker_name" value="メーカー名" />

                <SelectMaker
                    id="maker_name"
                    class="mt-1 block w-full"
                    v-model="form.maker_name"
                    :value="form.maker_name"
                    autofocus
                    required
                    autocomplete="maker_name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
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

                <InputError class="mt-2" :message="form.errors.name" />
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

                <InputError class="mt-2" :message="form.errors.name" />
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

                <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div>
                <InputLabel for="purchase_fee" value="購入金額" />

                <TextInput
                    id="purchase_fee"
                    type="integer"
                    class="mt-1 block w-full"
                    v-model="form.purchase_fee"
                    autofocus
                    required
                    autocomplete="purchase_fee"
                    style="width:12rem;"
                />
                <span style="padding-left: 0.1rem;">円</span>

                <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div>
                <InputLabel for="detailed_info" value="詳細情報" />

                <TextInput
                    id="detaild_info"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.detailed_info"
                    autofocus
                    autocomplete="detailed_info"
                />

                <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div>
                <InputLabel for="stock_check" value="在庫がなければチェック" />

                <input
                id="stock_check"
                type="checkbox"
                v-model="form.stock_check"
                />
                </div>
            </div>
        </div>

        <h1>釣果情報</h1>
        <div class="fishinfo">
            <div class="info">
                <div class="photo">
                    <img v-if="previewFishing" :src="previewFishing" alt="">
                    <img v-else src="../images/20200504_noimage.png" alt="">
                    <input
                        id="fishingPhoto"
                        @input="form.fishingPhoto = $event.target.files[0]"
                        type="file"
                        @change="fishingFile"
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
                        autofocus
                        autocomplete="fish_category"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
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

                    <InputError class="mt-2" :message="form.errors.name" />
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

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div>

                    <InputLabel for="condition" value="コンディション" />
                <TextInput
                        id="condition"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.condition"
                        autofocus
                        autocomplete="condition"
                        style="  margin-bottom: 1rem;"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
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

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div>
                    <InputLabel for="share_stock" value="シェアする場合はチェック" />

                    <input
                    id="share_stock"
                    type="checkbox"
                    v-model="form.share_stock" />
                </div>
            </div>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" :disabled="form.processing">登録</button>
            </div>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">更新しました。</p>
                </Transition>

            </div>
        </form>
    </UserLayout>
  </section>
</template>