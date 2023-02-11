<template>
    <div class="w-screen h-screen blur_ flex justify-center items-center">
        <form class=" flex flex-col justify-center items-center p-3 bg-white rounded-md gap-5" @submit.prevent="handleSubmit">
            <p>Access to your Appointment</p>
            <input type="token" name="token" class="border w-[200px] rounded-md p-2" v-model="token" />
            <button class="p-2 rounded-md bg-green-500 text-white">access</button>
        </form>
    </div>
</template>
<script lang="ts" setup>
    import { Ref, ref } from 'vue';
    import { pageAccess, getToken } from '../utils/authorization';
    import { useRouter } from 'vue-router';

    //if the token exist the user should redirected to calendar
    pageAccess()

    //assure the loading of the background each time we access to login page
    document.body.classList.remove("pt-3");

    document.body.classList.add("bg-edit");

    //logic

    const route = useRouter();

    const token:Ref<String> = ref("");


    const handleSubmit = async(e:Event)=>{
        console.log(token);
        if(token.value){
            const res = await fetch("http://localhost:9000/api/tokenAccess", {
                method: "POST",
                body: JSON.stringify({token: token.value})
            });
            const data = await res;
            if(data.status === 401)
                alert("invalide token");
            else{
                localStorage.setItem("token", token.value.valueOf());
                route.push("/calendar");
            }
        }
    };
</script>
<style scoped>

.blur_{
        backdrop-filter: blur(10px);
    }
    
</style>