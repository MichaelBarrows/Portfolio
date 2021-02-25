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

function education_dropdown_add_event() {
    var education_items = document.getElementsByClassName('education');
    for (i = 0; i < education_items.length; i++) {
        var icon_link = education_items[i].querySelector('a');

        icon_link.addEventListener("click", function(event){
            event.preventDefault();
            var icon = this.querySelector('i');
            education_body = this.parentElement.parentElement.querySelector('.body');
            education_header = this.parentElement.parentElement.querySelector('.header')
            if (icon.classList.contains("fa-chevron-down")) {
                icon.classList.remove("fa-chevron-down");
                icon.classList.add("fa-chevron-up");
                education_header.classList.add("open");
                education_header.classList.remove("closed");
                education_body.style = "display: block;";
            } else {
                icon.classList.remove("fa-chevron-up");
                icon.classList.add("fa-chevron-down");
                education_header.classList.add("closed");
                education_header.classList.remove("open");
                education_body.style = "display: none;";
            }
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


function setUserAcceptanceCookie () {
    var expiry_date = new Date();
    expiry_date.setTime(expiry_date.getTime() + (14 * 24 * 60 * 60 * 1000));
    var expires = "expires="+expiry_date.toUTCString();
    document.cookie = "cookies_accept=true;" + expires + ";path=/";
    return;
}

function getUserAcceptanceCookie () {
    var name = "cookies_accept=";
    var cookie_array = document.cookie.split(';');
    for(var idx = 0; idx < cookie_array.length; idx++) {
        var element = cookie_array[idx];
        while (element.charAt(0) == ' ') {
            element = element.substring(1);
        }
        if (element.indexOf(name) == 0) {
            return element.substring(name.length, element.length);
        }
    }
}

function checkUserAcceptanceCookie () {
    var cookie = getUserAcceptanceCookie();
    if (cookie == "true") {
        return;
    } else {
        createCookieBanner();
    }
}

function createCookieBanner () {
    var cookies_container = document.createElement("div");
    cookies_container.setAttribute("id", "cookies");
    var wrapper = document.createElement("div");
    wrapper.setAttribute("class", "grid-container");
    cookies_container.appendChild(wrapper);
    var grid = document.createElement("div");
    grid.setAttribute("class", "grid");
    wrapper.appendChild(grid);
    var text = document.createElement("p");
    text.setAttribute("class", "small-12 medium-10 large-10 xlarge-10");
    text.innerHTML = "This website uses cookies for analytical purposes to improve your user experience.";
    grid.appendChild(text);
    var button_container = document.createElement("p");
    button_container.setAttribute("class", "button small-12 medium-2 large-2 xlarge-2");
    grid.appendChild(button_container);
    var link = document.createElement("a");
    link.setAttribute("href", "#");
    link.setAttribute("id", "cookies-accept");
    link.innerHTML = "Close <span class='fa fa-times-circle right'></span>";
    link.onclick = function () {
        event.preventDefault();
        setUserAcceptanceCookie();
        removeCookieBanner();
    }
    button_container.appendChild(link);
    document.body.appendChild(cookies_container);
}

function removeCookieBanner () {
    var cookie_banner = document.getElementById("cookies");
    cookie_banner.remove();
    return;
}

function toggle_mobile_nav () {
    var bars = document.getElementById('bars');
        bars.addEventListener("click", function(event){
            event.preventDefault();
            nav_links = bars.parentElement.querySelectorAll('a');
            for (idx = 0; idx < nav_links.length; idx++) {
                if (bars.classList.contains('hidden')) {
                    nav_links[idx].classList.remove('hidden');
                    nav_links[idx].classList.add('show');
                } else {
                    nav_links[idx].classList.remove('show');
                    nav_links[idx].classList.add('hidden');
                }
            }
    });

}


document.addEventListener("DOMContentLoaded", function() {
    stack_filters_add_event();
    education_dropdown_add_event();
    checkUserAcceptanceCookie();
    toggle_mobile_nav();
});
