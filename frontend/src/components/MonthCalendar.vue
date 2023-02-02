<template>
    <div class="border rounded-md p-2 mt-3">
        <p class="font-bold text-[20px]">{{ year }}</p>
        <p class="font-semibold text-[13px] mt-2">{{monthNames[date.getMonth()]}}</p>
        <div class="grid grid-cols-7 grid-rows-4 mt-2">
            <!-- v-bind:class <=> :class -->
            <span v-for="n in days" :class="{
                'bg-[#1a73e8] text-white shadow-lg': n===date.getDate(),
                'text-gray-400 cursor-not-allowed': n < date.getDate(),
                'cursor-pointer': n >= date.getDate(),
                }"
            class="text-[12px] text-balck p-3 mt-2 text-center gap-20 flex justify-center items-center rounded-[50%] h-[6px] w-[6px]">
                {{ n }}
            </span>
        </div>
    </div>
</template>
<script lang="ts" setup>
    const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    const date = new Date();
    const days = new Date(date.getFullYear(), date.getMonth()+1, 0).getDate();
    let year = date.getFullYear();
</script>