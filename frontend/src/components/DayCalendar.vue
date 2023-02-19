<template v-once>
    <div class="flex flex-col w-full overflow-y-scroll">
        <div v-for="n in states.hours" class="w-full h-full border p-7 flex justify-between items-center" @dblclick="handleAppointment">
            <span >{{ 9+n-1 }}-{{ 9+n }}</span>
            <div v-if="hourChecker(`${9+n-1}-${9+n}`) === 2" class="p-2 text-white bg-green-500 rounded-md" >free appointment</div>
            <div v-if="hourChecker(`${9+n-1}-${9+n}`) === 1" class="p-2 text-white bg-red-500 rounded-md">already taken</div>
            <div v-if="hourChecker(`${9+n-1}-${9+n}`) === 3" class="p-2 text-white bg-blue-500 rounded-md" >taken by you</div>
            <span></span>
        </div>
    </div>

</template>
<script lang="ts" setup>
    import {reactive, computed, onBeforeMount} from "vue";
    import { useCalendarStore } from "../store/CalendarStore";
    import { storeToRefs } from "pinia";
    import { faTheaterMasks } from "@fortawesome/free-solid-svg-icons";


    const states = reactive<{
        hours: number,
        notEmpty: string[]
    }>({
        hours: 9,
        notEmpty: []
    })

    const {day} = storeToRefs(useCalendarStore());
    const dateInstance = new Date();

    onBeforeMount(() => {
        console.log("before mount");
        fetch("http://localhost:9000/api/getAppointmentByDate", {
        method: "POST",
        body: JSON.stringify({
            date: dateInstance.getFullYear()+ "-" + (dateInstance.getMonth()+1) + "-" + day.value,
        }),
        }).then((res)=>res.json()).then((data)=>{
            states.notEmpty = data.appointments;
        });
    });
    if(new Date(dateInstance.getFullYear(), dateInstance.getMonth(), day.value.valueOf()).getDay() === 6)
        states.hours = 4;

    const handleAppointment = (e)=>{
        console.log("clicked");
        fetch("http://localhost:9000/api/addAppointment", {
            method: "POST",
            body: JSON.stringify({
                token: localStorage.getItem("token"),
                date: dateInstance.getFullYear()+ "-" + (dateInstance.getMonth()+1) + "-" + day.value,
                hour: e.target.childNodes[0].textContent,
                id: localStorage.getItem("id"),
            }),
        })
        // .then((res)=>res.json()).then((data)=>{
        //     console.log(data);
        // });
    }
    fetch("http://localhost:9000/api/getAppointmentByDate", {
        method: "POST",
        body: JSON.stringify({
            date: dateInstance.getFullYear()+ "-" + (dateInstance.getMonth()+1) + "-" + day.value,
        }),
    }).then((res)=>res.json()).then((data)=>{
        states.notEmpty = data.appointments;
    });

    const hourChecker = (hour_)=>{
         if(states.notEmpty.some((e)=> e.hour === hour_ && e.id_client !== localStorage.getItem("id") )){
            console.log(1);
            return 1;
        }
         if(states.notEmpty.some((e)=> e.hour !== hour_) || states.notEmpty.length === 0){
            console.log(2);
            return 2;
        }
         if(states.notEmpty.some((e)=> e.hour === hour_ && e.id_client === localStorage.getItem("id"))){
            console.log(3);
            return 3;
        }
    };
    

</script>