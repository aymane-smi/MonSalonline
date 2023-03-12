<template>
    <!-- <span v-if="props.day >= date.getDate() && ((day != 4 && isSaturday(props.day)) || (day != 9 && !isSaturday(props.day)))" class="p-2 rounded-md bg-green-500 text-white text-[12px] cursor-default">{{( !isSaturday(props.day) ? 9 : 4) - day }} Appointements available</span>
    <span v-else-if="props.day >= date.getDate() && ( (day == 4 && isSaturday(props.day)) || (day == 9 && !isSaturday(props.day)) )" class="p-2 rounded-md bg-red-500 text-white text-[12px] cursor-not-allowed" >
        Inavailable appointements
    </span> -->
    <span v-if="props.day >= date.getDate() && (day != 3 && isSunday(props.day))" class="p-2 rounded-md bg-green-500 text-white text-[12px] cursor-default">
        {{ 3 - day }} Appointements available
    </span>
    <span v-else-if="props.day >= date.getDate() && (day != 7 && isFriday(props.day))" class="p-2 rounded-md bg-green-500 text-white text-[12px] cursor-default">
        {{ 7 - day }} Appointements available
    </span>
    <span v-else-if="props.day >= date.getDate() && (day != 10 && !isSunday(props.day) && !isFriday(props.day))" class="p-2 rounded-md bg-green-500 text-white text-[12px] cursor-default">
        {{ 10 - day }} Appointements available
    </span>
    <span v-else-if="props.day >= date.getDate()" class="p-2 rounded-md bg-red-500 text-white text-[12px] cursor-not-allowed" >
        Inavailable appointements
    </span>
</template>
<script lang="ts" setup>
import { ref, Ref } from 'vue';
import { isFriday, isSaturday, isSunday } from '../utils/dayHelper';

const props = defineProps<{
    day: number,
    date: Date,
}>();
let day:Ref<number> = ref(0);
    await fetch("http://localhost:9000/api/countByDate", {
            method: "POST",
            body: JSON.stringify({
                date: `${props.date.getFullYear()}/${props.date.getMonth()+1}/${props.day}`,
            })
        }).then((res)=>res.json()).then((data)=>{
            day = data.appointments.count;
        });
</script>