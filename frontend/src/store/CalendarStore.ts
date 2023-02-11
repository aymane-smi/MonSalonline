import {defineStore} from "pinia";
import { storeState } from "../utils/types";

export const useCalendarStore = defineStore('calendarStore', {
    state : () : storeState =>({
        screen : 1,
        day: null,
    }),
    actions: {
        changeScreen : function (option:Number){
            this.screen = option;
        },
        changeDay: function(day:number){
            this.day = day;
        },
        
    }
});