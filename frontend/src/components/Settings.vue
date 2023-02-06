<template>
    <form class="rounded-md p-7 bg-white h-[400px] overflow-y-scroll" >
            <p class="text-[25px] font-bold w-full text-center">Register</p>
            <div class="flex flex-col gap-2 mt-3">
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="fname" class="p-3 border rounded-md" v-model="inputs.fname"/>
            </div>
            <div class="flex flex-col gap-2 mt-3">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname" class="p-3 border rounded-md" v-model="inputs.lname"/>
            </div>
            <div class="flex flex-col gap-2 mt-3">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="p-3 border rounded-md" v-model="inputs.username"/>
            </div>
            <div class="flex flex-col gap-2 mt-3">
                <label for="phone">Phone</label>
                <input type="phone" name="phone" id="phone" class="p-3 border rounded-md" v-model="inputs.phone"/>
            </div>
            <div class="flex flex-col gap-2 mt-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="p-3 border rounded-md" v-model="inputs.email"/>
            </div>
            <button class="p-2 rounded-md bg-green-300 text-white mt-3">Register</button>
        </form>
</template>
<script lang="ts" setup>
import { reactive } from 'vue';
import { formInputs } from "../utils/types";

const inputs:formInputs = reactive({
    fname: "",
    lname: "",
    email: "",
    phone: "",
    username: "",
});


</script>
<style scoped></style>