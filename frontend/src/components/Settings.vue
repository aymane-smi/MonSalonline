<template>
    <form class="rounded-md p-7 bg-white overflow-y-scroll" >
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
                <label for="phone">Phone</label>
                <input type="phone" name="phone" id="phone" class="p-3 border rounded-md" v-model="inputs.phone"/>
            </div>
            <div class="flex flex-col gap-2 mt-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="p-3 border rounded-md" v-model="inputs.email"/>
            </div>
            <button class="p-2 rounded-md bg-green-500 text-white mt-3">Register</button>
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
});

fetch("http://localhost:9000/api/getClient", {
    method:"POST",
    body: JSON.stringify({
        "token": localStorage.getItem("token"),
    })
}).then((res)=>res.json()).then((data)=>{
  inputs.lname = data.lname;
  inputs.fname= data.fname;
  inputs.username = data.username;
  inputs.email = data.email;
  inputs.phone = data.phone;
});

</script>
<style scoped></style>