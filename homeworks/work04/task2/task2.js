const form = document.querySelector("form");
const overlay = document.querySelector(".overlay");
const create = document.querySelector(".create");
const edit = document.querySelector(".edit");
const delButtons = document.querySelectorAll(".delete");

if(show) {
    overlay.style.display = "flex";
}

try {
    edit.addEventListener("click", (e) => {
        overlay.style.display = "flex";
    });
} catch {
    console.log("Not yet");
}

delButtons.forEach(button => {
    button.addEventListener("click", (e) => {
        delForm = document.createElement("form");
        let hiddenInput = document.createElement("input");
        hiddenInput.setAttribute("type", "hidden");
        hiddenInput.setAttribute("name", "del_path");
        hiddenInput.setAttribute("value", e.target.dataset.path);
            
        delForm.appendChild(hiddenInput);
        delForm.method = "POST";
        delForm.action = "task2.php";
        document.body.appendChild(delForm);

        delForm.submit();
    })
})

create.addEventListener("click", () => {
    overlay.style.display = "flex";
});

document.addEventListener("click", (e) => {
    let clicked = e.target;

    if(clicked === create || clicked === edit) return;
    if(clicked === overlay) window.location = window.location.href.split("?")[0];

    do {
        if(clicked === form) return;
        clicked = clicked.parentNode;
    } while(clicked);

    overlay.style.display = "none";
});