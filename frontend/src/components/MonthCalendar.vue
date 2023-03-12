<template>
    <div class="border rounded-md p-2 mt-3">
        <p class="font-bold text-[20px]">{{ year }}</p>
        <p class="font-semibold text-[13px] mt-2">{{monthNames[date.getMonth()]}}</p>
        <div class="grid grid-cols-7 grid-rows-4 mt-2">
            <!-- v-bind:class <=> :class -->
            <button v-for="n in days" :class="{
                'bg-[#1a73e8] text-white shadow-lg cursor-pointer': n===date.getDate() ,
                'cursor-not-allowed': new Date(date.getFullYear(), date.getMonth(), n).getDay() !== 0,
                //new Date(date.getFullYear(), date.getMonth(), n).getDay() === 0
                'text-gray-400 cursor-not-allowed': n < date.getDate(),
                //&& new Date(date.getFullYear(), date.getMonth(), n).getDay() !== 0
                'hover:bg-gray-300 cursor-pointer': n > date.getDate(),
                //&& new Date(date.getFullYear(), date.getMonth(), n).getDay() !== 0
                'bg-green-500 text-white shadow-lg': n === store.day,
                }"
                class="text-[12px] text-balck p-3 mt-2 text-center gap-20 flex justify-center items-center rounded-[50%] h-[6px] w-[6px]"
                @click="handleClick"
            >
                {{ n }}
            </button>
        </div>
    </div>
</template>
<script lang="ts" setup>
    import { useCalendarStore } from '../store/CalendarStore';

    const store = useCalendarStore();

    const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    const date = new Date();
    const days = new Date(date.getFullYear(), date.getMonth()+1, 0).getDate();
    let year = date.getFullYear();

    const handleClick = (e:any)=>{
        if(parseInt(e.target.textContent) >= date.getDate()){
            store.changeScreen(3);
            store.changeDay(parseInt(e.target.textContent));
        }
    };
</script>