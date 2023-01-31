<template>
    <nav class="font-tako border-t-[4px] border-white mx-6 text-white pt-6 px-3 flex justify-between items-center">
       <div class="flex flex-col text-[20px]">
            <RouterLink to="/">Home</RouterLink>
            <RouterLink to="/login">Login</RouterLink>
       </div>
       <p class="text-[30px]">MonSalonLine</p>
       <div class="font-thin">
        <p>address</p>
        <p>1234567890</p>
        <p>email@test.com</p>
       </div> 
    </nav>
    <main class="mt-[40px] w-full">
        <div class="w-full text-white flex justify-start items-start gap-[50px] pl-[100px] font-tako leading-[120px]">
            <span class="text-[60px] ">/01</span>
            <p class="w-[27%] text-[100px] align-text-top">BARBERING IS WHAT WE DO</p>
        </div>

        <div class="flex pl-[200px] gap-5 font-semibold font-tako">
            <router-link to="/create" class="bg-[#efefef] rounded-[20px] p-4 text-black">make an appointment</router-link>
            <router-link to="/signup" class="border-[#efefef] border-[2px] rounded-[20px] p-4 text-[#efefef]">signup</router-link>
        </div>
    </main>
</template>
<script setup lang="ts">
document.body.classList.add("bg-edit");
document.body.classList.add("pt-3");
</script>
<style scoped></style>