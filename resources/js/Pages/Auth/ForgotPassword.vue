<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import img from '@/images/changepage.png'

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <img src="../images/changepage.png" alt="" class="change-img" />
        <Head title="Forgot Password" />

        <section id="sendform">
            <div class="form_background">
        <div class="mb-4 text-sm text-gray-600">
            以下のボタンから、パスワード再設定用リンクを登録メールアドレスに送信します。<br>
            ボックス内に登録メールアドレスを入力のうえ、ボタンをクリックしてください。<br>
            送信されたパスワード再設定用リンクからパスワードの再設定をお願いいたします。
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
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

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" style="width:20rem;">
                    パスワード再設定用リンクを送信する
                </PrimaryButton>
            </div>
        </form>
        </div>
    </section>
</template>
