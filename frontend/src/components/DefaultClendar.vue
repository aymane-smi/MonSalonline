<template>
    <div class="grid grid-cols-7 w-full">
        <div class="border p-4 flex flex-col items-center justify-start gap-4" v-for="n in days" :class="{
            'bg-gray-100 cursor-not-allowed' : n < date.getDate() || isSunday(n),
        }" @dblclick="$emit('times', n)">
            <span :class="{
                'bg-[#1a73e8] text-white shadow-lg p-2 h-[30px] w-[30px] rounded-[50%] flex justify-center items-center cursor-default': n===date.getDate()
            }">
                {{ n }}
            </span>
            <Suspense>
                <DayColumn v-if="!isSunday(n)" :date="date" :day="n"/>
            </Suspense>
        </div>
    </div>
</template>
<script lang="ts" setup>
    import { Suspense } from 'vue';
    import DayColumn from './DayColumn.vue';
    import {isSunday} from "../utils/dayHelper";
    const date = new Date();
    const days = new Date(date.getFullYear(), date.getMonth()+1, 0).getDate();
</script>