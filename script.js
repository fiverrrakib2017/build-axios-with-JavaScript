
const getButton=document.getElementById("get-button");

const sendButton=document.getElementById("send-button");

const sendRequest=function (method, url, DATA){
    const promise=new Promise((resolve,reject)=>{
        const xhr=new XMLHttpRequest();
        xhr.open(method,url);
        xhr.responseType="json";
        xhr.send(DATA);
        xhr.onload=function(){
            resolve(xhr.response);
        }
    });   
    return promise;
};

const getData=function(){
    sendRequest("GET",'https://jsonplaceholder.typicode.com/users')
    .then((response)=>{
        console.log(response);
    });
};
const sendData=function(){
    sendRequest("POST",'https://jsonplaceholder.typicode.com/posts',
        JSON.stringify({
            title: 'foo',
            body: 'bar',
            userId: 1,
        })
      )
    .then((response)=>{
        console.log(response);
    });
};

getButton.addEventListener("click",getData);
sendButton.addEventListener("click",sendData);

