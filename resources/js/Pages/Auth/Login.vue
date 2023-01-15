<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import Layout from '@/Components/Layout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import img from '@/images/SignUP_Login.png';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ログイン</title>
        <meta name="description" content="ログインします。">
    </head>
    <img src="../images/SignUP_Login.png" alt="" class="login-img" />
    <Layout>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div id="userform">
            <div>
                <InputLabel for="email" value="メールアドレス" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
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
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="items-center" style="width:20rem;">
                    <Checkbox name="remember" v-model:checked="form.remember" style="width:5rem; height:1rem;"/>
                    <span class="ml-2 text-sm text-gray-600">パスワードを記憶する</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    パスワードを忘れた方はコチラ
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    ログイン
                </PrimaryButton>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a :href="route('auth.google')">
                    <img class="google_login" src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="width: 100%;text-align:center;">
                </a>
            </div>
            </div>
        </form>
    </Layout>
</template>
