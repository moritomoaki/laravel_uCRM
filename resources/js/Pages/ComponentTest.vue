<script setup>
    import GuestLayout from '@/Layouts/GuestLayout.vue'
    import Label from '@/Components/InputLabel.vue'
    import Input from '@/Components/TextInput.vue'

    const emitTest = (e) => console.log(e)
</script>

<template>
    <GuestLayout>
        <!-- コンポーネントを参照 v-ifでvalueがあればvalueが優先されているため"件名"が優先される -->
        <Label value="件名">タイトル</Label>
        <Input modelValue="初期値が入るはず"
        @update:modelValue="emitTest"
        ></Input>
    </GuestLayout>
</template>
