<script setup>
import {  Link } from '@inertiajs/vue3';
import { ref } from 'vue'

const newTitle = ref('')
const newContent = ref('')
</script>

<template>
<!-- HTMLを書く場所 -->
Inertiaテストです<br>
<a href="/">aタグです</a><br>
<Link href="/">Link経由です</Link><br>
<!-- routeの中身web.phpのnameで指定していたもの -->
<Link :href="route('inertia.index')">名前付きルートの確認</Link><br>
<Link :href="route('inertia.show', { id : 1 })">ルートパラメータのtest</Link>
<!-- mb8の記述法はtailwindの書き方 -->
<div class="mb-8"></div>
<input type="text" name="newTitle" v-model="newTitle"><br>
<input type="text" name="newContent" v-model="newContent"><br>
<Link as="button" method="post" :href="route('inertia.store')" :data="{
    title: newTitle,
    content: newContent
}">DB保存テスト</Link>
</template>
