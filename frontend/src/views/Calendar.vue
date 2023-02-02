<template>
    <NavBar />
    <main class="w-screen mt-[64px]">
        <Sidebar />
    </main>
</template>
<script setup lang="ts">
    import NavBar from "../components/Navbar.vue";
    import Sidebar from "../components/Sidebar.vue";
    document.body.classList.remove("bg-edit");
    document.body.classList.remove("pt-3");
</script>
<style scoped></style>