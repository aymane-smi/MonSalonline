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
    return initDate(n).getDay() === 6;
}

export const getDate = (n:string)=>{
    const tmp = getDateObj();
    return `${tmp.getFullYear()}-${tmp.getMonth()+1}-${n}`;
}

export const isFriday = (n:number)=>{
    return initDate(n).getDay() === 5;
}