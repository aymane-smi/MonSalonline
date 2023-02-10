import {defineStore} from "pinia";
import { storeState } from "../utils/types";

export const useCalendarStore = defineStore('calendarStore', {
    state : () : storeState =>({
        screen : 1,
    }),
    actions: {
        changeScreen : function (option:Number){
            this.screen = option;
        }
    }
});