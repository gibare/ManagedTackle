<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import { nextTick, ref } from 'vue';
import img from '@/images/changepage.png'


const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('user.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <img src="./images/changepage.png" alt="" class="change-img" />
    <section id="delete_form">
        <header>
            <h2 class="text-lg font-medium text-gray-900">アカウント削除</h2>

            <p class="mt-1 text-sm text-gray-600">
                アカウントを削除すると、全てのデータが完全に削除されます。
            </p>
        </header>

        <DangerButton @click="confirmUserDeletion" style="width:13rem; margin:0 auto; background: #fd4a4a">アカウントを削除する</DangerButton>

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    アカウントを削除してよろしいですか？
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                   パスワードを入力して、アカウントを削除してください。
                </p>

                <div class="mt-6">
                    <InputLabel for="password" value="Password" class="sr-only" />

                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-3/4"
                        @keyup.enter="deleteUser"
                    />

                    <InputError :message="form.errors.password" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal">キャンセル</SecondaryButton>

                    <DangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                        style="width:13rem; background: #fd4a4a;"
                    >
                        アカウントを削除する
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
