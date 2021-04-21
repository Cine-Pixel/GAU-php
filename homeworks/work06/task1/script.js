let is_open = false;

let delButtons = document.querySelectorAll(".delete");

delButtons.forEach(button => {
    button.addEventListener("click", (e) => {
        delForm = document.createElement("form");
        let hiddenInput = document.createElement("input");
        hiddenInput.setAttribute("type", "hidden");
        hiddenInput.setAttribute("name", "delete_file");
        hiddenInput.setAttribute("value", e.target.dataset.delete);
        console.log(e.target.dataset.delete);
            
        delForm.appendChild(hiddenInput);
        delForm.method = "POST";
        delForm.action = "index.php";
        delForm.style.display="none";
        document.body.appendChild(delForm);

        delForm.submit();
    });
});

$("#toggle-forms").click(function() {
    is_open = !is_open;
    if(is_open) 
        $(".form-toggler").css({'transform': 'rotate(45deg)'});
    else $(".form-toggler").css({'transform': 'rotate(0deg)'});
    $(".forms-wrapper").slideToggle("slow");
});