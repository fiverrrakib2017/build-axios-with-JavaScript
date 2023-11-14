const Rakib=function (method,url){
    const promise=new Promise((resolve, reject)=>{
        const xhr=new XMLHttpRequest();
        xhr.open(method,url);
        xhr.send();
        xhr.onload=function (){
            resolve(xhr.response);
        }
        xhr.onerror=function (){
            reject(new Error('Request Not Ok'));
        }
    });
    return promise;
}

export {Rakib};


export const getUserInformation=()=>{
    console.log('hello Rakib ');
}


class Person {
    constructor(name,email,password){
        this.name=name;
        this.email=email;
        this.password=password;
    }
    information(){
        return `Hello, my name is ${this.name} AND My Email address is ${this.email} AND Password is ${this.password}`;
    }
}

export {Person};


class Axios{
    get(method,url){
        const promise=new Promise((resolve, reject)=>{
            const xhr=new XMLHttpRequest();
            xhr.open(method,url);
            xhr.send();
            xhr.onload=function (){
                resolve(xhr.response);
            }
            xhr.onerror=function (){
                reject(new Error('Request Not Ok'));
            }
        });
        return promise;
    }
   

    
}

export {Axios};