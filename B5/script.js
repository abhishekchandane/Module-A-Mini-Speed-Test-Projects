const graph = {
    A: { D: 2 },
    B: {},
    C: { F: 1 },
    D: { A: 2, E: 2 },
    E: { D: 2, F: 3 },
    F: { E: 3, G: 1, C: 1 },
    G: { F: 1, H: 4 },
    H: { G: 4 }
};

let start = null;
let end = null;

const rooms = document.querySelectorAll(".room");
const result = document.getElementById("result");

rooms.forEach(function (room) {

    room.addEventListener("click", function () {

        const clickedRoom = room.id;

        /* Third click = new start */

        if (start !== null && end !== null) {
            clearPath();

            start = clickedRoom;
            end = null;

            room.classList.add("selected");

            result.textContent = "Select end room";

            return;
        }

        /* First click */

        if (start === null) {
            start = clickedRoom;

            room.classList.add("selected");

            result.textContent = "Select end room";

            return;
        }

        /* Second click */

        end = clickedRoom;

        const answer = findShortestPath(start, end);

        showResult(answer);
    });
});


function findShortestPath(start, end) {

    const distance = {};
    const previous = {};
    const visited = {};

    Object.keys(graph).forEach(function (room) {
        distance[room] = Infinity;
    });

    distance[start] = 0;

    while (true) {

        let current = null;
        let shortest = Infinity;

        Object.keys(distance).forEach(function (room) {

            if (!visited[room] && distance[room] < shortest) {
                shortest = distance[room];
                current = room;
            }

        });

        if (current === null || current === end) {
            break;
        }

        visited[current] = true;

        Object.keys(graph[current]).forEach(function (neighbor) {

            const newDistance =
                distance[current] + graph[current][neighbor];

            if (newDistance < distance[neighbor]) {
                distance[neighbor] = newDistance;
                previous[neighbor] = current;
            }

        });
    }

    const path = [];
    let current = end;

    while (current) {
        path.unshift(current);

        if (current === start) {
            break;
        }

        current = previous[current];
    }

    return {
        path: path,
        distance: distance[end]
    };
}


function showResult(answer) {

    result.textContent =
        start + " → " +
        end + ": " +
        answer.path.join("-") +
        ", total distance " +
        answer.distance;

    document.getElementById(start).classList.add("selected");
    document.getElementById(end).classList.add("selected");

    answer.path.forEach(function (room) {
        document.getElementById(room).classList.add("path");
    });
}


function clearPath() {

    rooms.forEach(function (room) {
        room.classList.remove("selected");
        room.classList.remove("path");
    });
}