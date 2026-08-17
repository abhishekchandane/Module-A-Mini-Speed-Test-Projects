let draggedItem = null;

const items = document.querySelectorAll(".item");
const lists = document.querySelectorAll(".items");

items.forEach(function (item) {

    item.addEventListener("dragstart", function () {
        draggedItem = item;
    });

});

lists.forEach(function (list) {

    list.addEventListener("dragover", function (event) {
        event.preventDefault();
    });

    list.addEventListener("drop", function () {
        list.appendChild(draggedItem);
    });

});