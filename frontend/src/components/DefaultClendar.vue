<template>
    <div class="grid grid-cols-7 w-full">
        <div class="border p-4 flex flex-col items-center justify-start gap-4" v-for="n in days" :class="{
            'bg-gray-100 cursor-not-allowed' : n < date.getDate(),
        }" @dblclick="$emit('times')">
            <span :class="{
                'bg-[#1a73e8] text-white shadow-lg p-2 h-[30px] w-[30px] rounded-[50%] flex justify-center items-center cursor-default': n===date.getDate()
            }">
                {{ n }}
            </span>
            <span v-if="n >= date.getDate()" class="p-2 rounded-md bg-green-500 text-white text-[12px] cursor-default">9 Appointement available</span>
        </div>
    </div>
</template>
<script lang="ts" setup>
    const date = new Date();
    const days = new Date(date.getFullYear(), date.getMonth()+1, 0).getDate();
</script>