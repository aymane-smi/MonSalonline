<template>
    <div class="w-screen h-screen blur_ flex justify-center items-center">
        <form class="rounded-md p-7 bg-white h-[400px] overflow-y-scroll" @submit.prevent="handleSubmit">
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
    </div>
</template>
<script lang="ts" setup>

import { reactive, toRefs } from 'vue';
import { formInputs} from "../utils/types";
import { routerKey, useRouter } from 'vue-router';

const route = useRouter();

document.body.classList.remove("pt-3");

document.body.classList.add("bg-edit");

const inputs:formInputs = reactive({
    fname: "",
    lname: "",
    email: "",
    phone: "",
    username: "",
});

const handleSubmit = async(e:Event)=>{
    const formData = new FormData();
    formData.append("fname", <string>inputs.fname);
    formData.append("lname", <string>inputs.lname);
    formData.append("email", <string>inputs.email);
    formData.append("phone", <string>inputs.phone);
    formData.append("username", <string>inputs.username);
    let body: { [k: string]: string; } = {};
    formData.forEach((v, k)=>{
        body[k]=<string>v;
    });
    let res = await fetch("http://localhost:9000/api/createClient", {
        method: "POST",
        body: JSON.stringify(body),
    });
    const data = await res.json();
    localStorage.setItem("token", data.token);
    route.push("/Calendar");
};
</script>
<style scoped>
    .blur_{
        backdrop-filter: blur(10px);
    }
</style>