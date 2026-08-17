let quantity = 0;
let unitPrice = 100;

const quantityElement = document.getElementById("quantity");
const totalElement = document.getElementById("total");

document.getElementById("plus").addEventListener("click", function () {
    quantity++;

    updateTotal();
});

document.getElementById("minus").addEventListener("click", function () {
    if (quantity > 0) {
        quantity--;
    }

    updateTotal();
});

function updateTotal() {
    quantityElement.textContent = quantity;
    totalElement.textContent = unitPrice * quantity;
}