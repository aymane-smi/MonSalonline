<template>
  <NavBar />
  <main class="w-screen mt-[64px] flex">
    <Sidebar @switch="switchScreen" />
    <DefaultClendar
      v-if="store.screen === 1"
      @times="showTimes"
      class="w-[80vw] height overflow-y-scroll"
    />
    <Settings
      v-if="store.screen === 2"
      class="w-[80vw] height overflow-y-scroll"
    />
    <Suspense>
      <DayCalendar
        v-if="store.screen === 3"
        class="w-[80vw] height overflow-y-scroll"
        :key="store.day.valueOf()"
      />
    </Suspense>
  </main>
</template>
<script setup lang="ts">
import { ref, Ref } from "vue";
import NavBar from "../components/Navbar.vue";
import Sidebar from "../components/Sidebar.vue";
import Settings from "../components/Settings.vue";
import { pageAccess } from "../utils/authorization";
import DefaultClendar from "../components/DefaultClendar.vue";
import DayCalendar from "../components/DayCalendar.vue";
import { useCalendarStore } from "../store/CalendarStore";
import { storeToRefs } from "pinia";

pageAccess();

const store = useCalendarStore();

document.body.classList.remove("bg-edit");
document.body.classList.remove("pt-3");
const { day } = storeToRefs(useCalendarStore());
const switchScreen = (option: number) => {
  store.changeScreen(option);
};
const showTimes = (n:number) => {
  store.changeDay(n);
  store.changeScreen(3);
};
</script>
<style scoped>
.height {
  max-height: calc(100vh - 65px);
}
</style>
