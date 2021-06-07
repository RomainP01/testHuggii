window.onload = () => {

    document.querySelectorAll("input").forEach(input =>
        input.addEventListener("change", () => {
            const search = document.querySelector("#searchBar")
            const pickup = document.querySelector("#pickupBox")
            if (pickup.checked) {
                type = "&type=pickup"
            } else {
                type = "&type=creation"
            }
            const value = search.value
            const Url = new URL(window.location.href);

            fetch(Url.pathname + "?date=" + value + type + "&ajax=1", {
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            }).then(response => response.json()
            ).then(data => {
                const content = document.querySelector("#content")
                content.innerHTML = data.content
            })
                .catch(e => console.log(e));

        })
    );
}