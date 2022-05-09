const list = document.querySelectorAll('.list');
function activelink()
{
    list.forEach((item) =>
        item.classList.remove('active'));
        this.classList.add('active')

}
// console.log(list);
list.forEach((item) =>
    item.addEventListener('click',activelink));
