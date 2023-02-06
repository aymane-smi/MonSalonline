import {useRouter} from "vue-router";

export const pageAccess = ()=>{
    const router = useRouter();
    if(!localStorage.getItem("token"))
        router.push("/login");
    else
        router.push("/Calendar");
};

export const getToken = ()=>{
    return localStorage.getItem("token");
};
 