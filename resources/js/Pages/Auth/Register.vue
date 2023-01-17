<script setup>
import Layout from '@/Components/Layout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import img from '@/images/SignUp_Login.png'

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    angler_years: '',
    terms: false,
});

const submit = () => {
    form.post(route('register.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

const csrf = () =>
{ document.querySelector('meta[name="csrf-token"]').getAttribute('content')}

</script>

<template>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>新規登録</title>
        <meta name="description" content="新規ユーザーを登録します。">
    </head>
    <img src="../images/SignUp_Login.png" alt="" class="signup-img" />
    <section>
    <Layout>
        <form @submit.prevent="submit">
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

            <div class="mt-4">
                <InputLabel for="email" value="メールアドレス" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="パスワード" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="パスワード確認" />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="アングラ―歴" />

                <TextInput
                    id="angler_years"
                    type="integer"
                    class="mt-1 block w-full"
                    v-model="form.angler_years"
                    required
                    autocomplete="new-angler_years"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    すでに登録されている方はコチラ
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" style="background:#4EB9F4;">
                    新規登録
                </PrimaryButton>
            </div>
            <div class="items-center justify-end mt-4">
                <a :href="route('auth.google')">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                    style="width:100%;">
                </a>
            </div>
            </div>
        </form>
    </Layout>
    </section>
</template>
