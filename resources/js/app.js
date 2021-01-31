require('./bootstrap');

function stack_filter (selected_stack) {
    proj_cards = document.getElementsByClassName("project-card");
    for (idx = 0; idx < proj_cards.length; idx++) {
        stack = proj_cards[idx].dataset.techStack;
        stack = stack.split(" ");
        if (selected_stack == "all-active") {
            proj_cards[idx].style.display = "block";
        } else {
            if (!stack.includes(selected_stack)) {
                proj_cards[idx].style.display = "none";
            } else {
                proj_cards[idx].style.display = "block";
            }
        }
    }
}

$(document).ready(function(){

    $('a.stack-filter').click(function () {
        event.preventDefault();
        stack = this.dataset.techStack;
        other_active = document.getElementsByClassName("active");
        for (idx = 0; idx < other_active.length; idx ++) {
            other_active[idx].classList.remove("active");
        }
        this.classList.add("active");
        stack_filter(stack);
    });



el = document.getElementById("1");
stack = el.dataset.techStack;
stack = stack.split(" ");
for (i = 0; i < stack.length; i++) {
    console.log(stack[i]);
}

});
