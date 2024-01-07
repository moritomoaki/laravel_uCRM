<script setup>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

// controllerの吐き出し？に使用
defineProps({
// errorの吐き出し
    errors:Object
})

// reactiveによって動的に変更を見極める
const form = reactive({
    title: null,
    content: null
})

const submitFunction = () => {
    // storeに送信する
    Inertia.post('/inertia', form)
}
</script>

<template>
    <!-- preventのおかげでページ全体がロードされることを防ぐ -->
    <form @submit.prevent="submitFunction">
        <input name="title" type="text" v-model="form.title"><br>
        <div v-if="errors.title">{{ errors.title }}</div>
        <input name="content" type="text" v-model="form.content"><br>
        <div v-if="errors.title">{{ errors.content }}</div>
        <button>送信</button>
    </form>
</template>
