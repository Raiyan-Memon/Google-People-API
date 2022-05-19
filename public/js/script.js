// const list = document.querySelectorAll('.list');
// function activelink()
// {
//     list.forEach((item) =>
//         item.classList.remove('active'));
//         this.classList.add('active')

// }
// // console.log(list);
// list.forEach((item) =>
//     item.addEventListener('click',activelink));


const currentLocation = location.href;
// console.log(currentLocation);

const menuitem = document.querySelectorAll('a');
// console.log(menuitem[4].href);

const menuLength = menuitem.length;
// console.log(menuitem('NodeList'));

console.log(menuLength);

if(menuitem[1].href == currentLocation){
    document.getElementById("profile").className = "active"; 
}
if(menuitem[2].href == currentLocation){
    document.getElementById("contact").className = "active"; 
}
if(menuitem[3].href == currentLocation){
    document.getElementById("contactgroup").className = "active"; 
}

if(menuitem[4].href == currentLocation){
    document.getElementById("othercontact").className = "active"; 
}

// for(var i=1; i<5; i++){
//     // alert('');
//     if(menuitem(i).href === currentLocation){
      
//         menuitem[i].className = "active"
//     }
// }


////

// const currentLocation = location.href;
// console.log(currentLocation);

// const menuitem = document.getElementsByClassName('list');
// console.log(menuitem[0]);
// // console.log(menuitem.length);

// const menuLength = menuitem.length;
// // console.log(menuitem('NodeList'));

// console.log(menuLength);


// for(var i=0; i<menuLength; i++){
//     alert('under for loop');
//     if(menuitem(i).href === currentLocation){
      
//         menuitem[i].className = "active";
//     }
// }
