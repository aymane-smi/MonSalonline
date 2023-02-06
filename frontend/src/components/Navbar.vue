<template>
    <nav class="bg-white z-40 top-0 font-tako px-4 w-screen border-[1px] border-grey-500 h-[60px] flex justify-between items-center shadow-md fixed">
        <p>MonSalonLine</p>
        <font-awesome-icon icon="fa-solid fa-right-from-bracket" @click="handleLogout" class="cursor-pointer"/>
    </nav>
</template>
<script lang="ts" setup>
    import { useRouter } from 'vue-router';
    const route = useRouter();
    const handleLogout = ()=>{
        localStorage.removeItem("token");
        route.push("/");
    }
</script>