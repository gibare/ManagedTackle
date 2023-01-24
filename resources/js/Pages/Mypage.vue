<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectMaker from '@/Components/SelectMaker.vue';
import { Link, useForm, usePage } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import UserLayout from '../Components/UserLayout.vue';
import img from '@/Pages/images/Mypage.png'


const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

const user = usePage().props.value.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
    angler_years: user.angler_years,
    favorite_maker_name: user.favorite_maker_name,
});

const csrf = () =>
{ document.querySelector('meta[name="csrf-token"]').getAttribute('content')}

</script>

<template>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>ユーザー情報</title>
        <meta name="description" content="ユーザーの基本情報を登録します。">
    </head>
    <img src="@/Pages/images/Mypage.png" alt="" class="mypage-img" />
    <section>
        <UserLayout>

        <form @submit.prevent="form.patch(route('user.update'))" class="mt-6 space-y-6">
            <input type="hidden" name="_token" :value="csrf">
            <div id="userform">
            <div>
                <InputLabel for="name" value="名前" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel for="email" value="メールアドレス" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="email"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div>
                <InputLabel for="angler_years" value="アングラ―歴" />

                <TextInput
                    id="angler_years"
                    type="integer"
                    class="mt-1 block w-full"
                    v-model="form.angler_years"
                    autocomplete="angler_years"
                />

                <InputError class="mt-2" :message="form.errors.angler_years" />
            </div>

            <div>
                <InputLabel for="favorite_maker_name" value="お気に入りのメーカー" />

                <SelectMaker
                    id="favorite_maker_name"
                    class="mt-1 block w-full"
                    v-model="form.favorite_maker_name"
                    :value="form.favorite_maker_name"
                    required
                    autocomplete="favorite_maker_name"
                />

                <InputError class="mt-2" :message="form.errors.favirite_maker_name" />
            </div>

                <Link
                    href="/passwordchange"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    パスワードの変更はコチラ
                </Link>

            <div class="flex items-center gap-4">
                <PrimaryButton :must-verify-email="mustVerifyEmail" :status="status" :disabled="form.processing">更新</PrimaryButton>

                <div class="logout_button">
                    <PrimaryButton onclick="location.href='/deleteuser'" style="background:#FD4A4A;">アカウント削除</PrimaryButton>
                </div>
            </div>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">更新しました。</p>
                </Transition>
            </div>
        </form>
        </UserLayout>
    </section>
</template>
