import { RouteRecordRaw } from "vue-router";
export const routes:Array<RouteRecordRaw> = [
    {
        path: "/",
        name: "home",
        component: ()=>import("../views/Home.vue"),
    },{
        path: "/register",
        name: "register",
        component: ()=>import("../views/Register.vue"),
    },
    {
        path: "/calendar",
        name: "calendar",
        component: ()=>import("../views/Calendar.vue"),
    },
    {
        path: "/login",
        name: "login",
        component: ()=>import("../views/Login.vue"),
    }
];