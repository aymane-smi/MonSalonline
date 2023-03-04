<template>
  <div class="flex flex-col w-full overflow-y-scroll relative">
    <div class="w-fit h-fit absolute rounded-lg p-2 border-2 menu bg-white hidden flex-col items-start">
    <button @click="removeAppointment">
      <font-awesome-icon icon="fa-solid fa-trash" /> remove
    </button>
    <button @click="closeMenu">
      <font-awesome-icon icon="fa-solid fa-circle-xmark" /> close
    </button>
    </div>
    <div
      v-for="n in states.hours"
      class="w-full h-full border p-7 flex justify-between items-center"
      @dblclick="handleAppointment"
    >
      <span>{{ 9 + n - 1 }}-{{ 9 + n }}</span>
      <div
        v-if="hourChecker(`${9 + n - 1}-${9 + n}`) == 2"
        class="p-2 text-white bg-green-500 rounded-md"
      >
        free appointment
      </div>
      <div
        v-if="hourChecker(`${9 + n - 1}-${9 + n}`) == 1"
        class="p-2 text-white bg-red-500 rounded-md"
      >
        already taken
      </div>
      <div
        v-if="hourChecker(`${9 + n - 1}-${9 + n}`) == 3"
        class="p-2 text-white bg-blue-500 rounded-md"
        @contextmenu="handleAlert"
      >
        taken by you
      </div>
      <span></span>
    </div>
  </div>
</template>
<script lang="ts" setup>
import { reactive, computed, onBeforeMount } from "vue";
import { useCalendarStore } from "../store/CalendarStore";
import { storeToRefs } from "pinia";
import {getDate} from "../utils/dayHelper";
import { RESOLVE_COMPONENT } from "@vue/compiler-core";

let removeTarget;
let key:boolean = false; 

const handleAlert = (e: { preventDefault?: any; clientX?: any; clientY?: any; })=>{
  e.preventDefault();
  const { clientX: mouseX, clientY: mouseY} = e;
  const menu = (document.querySelector(".menu") as HTMLCollection<Element>);
  menu.childNodes[0].dataset.hour = e.target.previousElementSibling.innerText;
  menu.classList.add("flex");
  menu.style.left = (mouseX-100)+"px";
  menu.style.top = (mouseY-100)+"px";
  menu.classList.remove("hidden");
  removeTarget = e.target;

}

const closeMenu = ()=>{
  document.querySelector(".menu")?.classList.remove("flex");
  document.querySelector(".menu")?.classList.add("hidden");
}

const states = reactive<{
  hours: number;
  notEmpty: string[];
}>({
  hours: 9,
  notEmpty: [],
});

const { day } = storeToRefs(useCalendarStore());
const dateInstance = new Date();

/*
    life cycle
*/

let res = await fetch("http://localhost:9000/api/getAppointmentByDate", {
  method: "POST",
  body: JSON.stringify({
    year: dateInstance.getFullYear(),
    month: (dateInstance.getMonth() + 1),
    day: day.value.valueOf(),
  }),
});
let data = await res.json();
states.notEmpty = await data.appointments;

if (
  new Date(
    dateInstance.getFullYear(),
    dateInstance.getMonth(),
    day.value.valueOf()
  ).getDay() === 6
)
  states.hours = 4;

/*
    handlers
*/

const handleAppointment = (e: { target: {
[x: string]: any; childNodes: {
[x: string]: any; classList: {
[x: string]: any; add: (arg0: string) => void; 
}; 
}[]; }; }) => {

  if(!key){
    fetch("http://localhost:9000/api/addAppointment", {
      method: "POST",
      body: JSON.stringify({
        token: localStorage.getItem("token"),
        date:
          dateInstance.getFullYear() +
          "-" +
          (dateInstance.getMonth() + 1) +
          "-" +
          day.value,
        hour: e.target.previousElementSibling.innerText,
        id: localStorage.getItem("id"),
      }),
    });
    e.target.classList.remove("bg-green-500");
    e.target.classList.add("bg-blue-500");
    e.target.innerText = "taken by you";
    key = true;
  }
};

const hourChecker = (hour_: string) => {
  if (states.notEmpty.some((e) => (e.hour == hour_ && e.id_client != localStorage.getItem("id")))) {
    return 1;
  }else if (states.notEmpty.every((e) => e.hour != hour_) || states.notEmpty.length === 0) {
    return 2;
  }else if (states.notEmpty.some((e) => (e.hour == hour_ && e.id_client == localStorage.getItem("id")))) {
    key = true;
    return 3;
  }
};

const removeAppointment = async(e: { target: { dataset: { hour: any; }; }; })=>{
  await fetch("http://localhost:9000/api/deleteAppointment", {
    method: "DELETE",
    body: JSON.stringify({
      hour: e.target.dataset.hour,
      date: getDate(day.value.toString()),
      client: localStorage.getItem("id"),
    }),
  });
  removeTarget.classList.remove("bg-blue-500");
  removeTarget.classList.add("bg-green-500");
  removeTarget.innerText = "free appointment";
  key = false;
  closeMenu();
}
</script>
