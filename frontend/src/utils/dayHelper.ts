export const getDateObj = ()=>{
    return new Date();
};

export const initDate = (n:number)=>{
    return new Date(getDateObj().getFullYear(), getDateObj().getMonth(), n);
}

export const isSunday = (n:number)=>{
    return initDate(n).getDay() === 0;
}

export const isSaturday = (n:number)=>{
    console.log(initDate(n).getDay() === 6, initDate(n).toDateString());
    return initDate(n).getDay() === 6;
}