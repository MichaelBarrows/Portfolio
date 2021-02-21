require('./bootstrap');

function stack_filters_add_event() {
    var stack_filters = document.getElementsByClassName('stack-filter');
    for (i = 0; i < stack_filters.length; i++) {
        stack_filters[i].addEventListener("click", function(event){
            event.preventDefault();
            stack = this.dataset.techStack;
            other_active = document.getElementsByClassName("active");
            for (j = 0; j < other_active.length; j ++) {
                other_active[j].classList.remove("active");
            }
            this.classList.add("active");
            stack_filter(stack);
        });

    }
}

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

document.addEventListener("DOMContentLoaded", function() {
    stack_filters_add_event();
});
