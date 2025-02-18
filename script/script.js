const rightbtn=document.querySelector('.fa-chevron-right')
const leftbtn=document.querySelector('.fa-chevron-left')
const imgNumber=document.querySelectorAll('.silder-content-left-top img')
console.log(imgNumber.length)
let index=0
rightbtn.addEventListener("click",function(){
    index=index+1
    if(index>imgNumber.length-1){
        index=0
    }
    removeactive()
    document.querySelector(".silder-content-left-top").style.right=index*100+"%"
    imgNumberLi[index].classList.add("active")
})
leftbtn.addEventListener("click",function(){
    index=index-1
    if(index<0){
        index=imgNumber.length-1
    }
    removeactive()
    document.querySelector(".silder-content-left-top").style.right=index*100+"%"
    imgNumberLi[index].classList.add("active")
})
// ------------------
const imgNumberLi=document.querySelectorAll('.sider-content-left-bottom li')
let imgactive=document.querySelector('.active')
imgNumberLi.forEach(function(image,index){
   image.addEventListener("click",function(){
         removeactive()
         document.querySelector(".silder-content-left-top").style.right=index*100+"%"
         image.classList.add("active")
   })
})
function removeactive(){
    let imgactive=document.querySelector('.active')
    imgactive.classList.remove("active")
}
// -----Tự động------------
function imgauto(){
    index=index+1;
    if(index>imgNumber.length-1){
        index=0
    }
    removeactive()
    document.querySelector(".silder-content-left-top").style.right=index*100+"%"
    console.log(index)
    imgNumberLi[index].classList.add("active")
}
setInterval(imgauto,5000)
