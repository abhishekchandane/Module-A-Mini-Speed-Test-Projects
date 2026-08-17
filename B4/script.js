const dates = document.getElementById("dates");
const monthYear = document.getElementById("monthYear");

let currentDate = new Date();

function showCalendar() {

    dates.innerHTML = "";

    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();

    monthYear.textContent = new Date(year, month).toLocaleString(
        "default",
        {
            month: "long",
            year: "numeric"
        }
    );

    const firstDay = new Date(year, month, 1).getDay();

    const daysInMonth = new Date(year, month + 1, 0).getDate();

    const daysInPreviousMonth =
        new Date(year, month, 0).getDate();

    /* Previous month's dates */

    for (let i = firstDay - 1; i >= 0; i--) {

        const day = daysInPreviousMonth - i;

        const date = document.createElement("div");

        date.textContent = day;
        date.classList.add("other-month");

        dates.appendChild(date);
    }


    /* Current month's dates */

    for (let day = 1; day <= daysInMonth; day++) {

        const date = document.createElement("div");

        date.textContent = day;

        const today = new Date();

        if (
            day === today.getDate() &&
            month === today.getMonth() &&
            year === today.getFullYear()
        ) {
            date.classList.add("today");
        }

        dates.appendChild(date);
    }


    /* Next month's dates */

    const totalCells = 42;

    const remaining = totalCells - dates.children.length;

    for (let day = 1; day <= remaining; day++) {

        const date = document.createElement("div");

        date.textContent = day;
        date.classList.add("other-month");

        dates.appendChild(date);
    }
}


document.getElementById("prev").addEventListener("click", function () {

    currentDate.setMonth(currentDate.getMonth() - 1);

    showCalendar();
});


document.getElementById("next").addEventListener("click", function () {

    currentDate.setMonth(currentDate.getMonth() + 1);

    showCalendar();
});


showCalendar();