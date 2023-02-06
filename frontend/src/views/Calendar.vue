<template>
    <NavBar />
    <main class="w-screen mt-[64px] flex">
        <Sidebar @switch="switchScreen"/>
        <span v-if="screen === 1">x</span>
        <Settings v-if="screen === 2" class="w-[80vw] h-screen"/>
    </main>
</template>
<script setup lang="ts">
    import { ref, Ref } from "vue";
    import NavBar from "../components/Navbar.vue";
    import Sidebar from "../components/Sidebar.vue";
    import Settings from "../components/Settings.vue";
    import { pageAccess } from "../utils/authorization";

    pageAccess();

    document.body.classList.remove("bg-edit");
    document.body.classList.remove("pt-3");

    const screen:Ref<Number> = ref(1);
    const switchScreen = (option:number)=>{
        screen.value = option;
    }
</script>
<style scoped></style>