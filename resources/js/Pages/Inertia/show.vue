<script setup>

import { Inertia } from '@inertiajs/inertia'

    defineProps({
        id   : String,
        blog : Object
    })

    const deleteConfirm = (id) => {
        Inertia.delete(`/inertia/${id}`, {
            onBefore: () => confirm('本当に削除しますか？')
        })
    }
</script>
<template>
    <!-- 波括弧2つはスタッシュと呼ばれる -->
    {{ id }}
    {{ blog.title }}
    <!-- アロー関数を走らせる -->
    <button @click="deleteConfirm(blog.id)">削除</button>
</template>
