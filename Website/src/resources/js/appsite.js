////////////////////////////////////////
//       BOOTSTRAP 5.0 TABS ALG       //
////////////////////////////////////////
function initBtTabs() {
    var triggerTabList = [].slice.call(document.querySelectorAll("#myTab a"));
    triggerTabList.forEach(function (triggerEl) {
        var tabTrigger = new bootstrap.Tab(triggerEl);

        triggerEl.addEventListener("click", function (event) {
            event.preventDefault();
            tabTrigger.show();
        });
    });
}

////////////////////////////////////////
//           RADAR FUNCTIONS          //
////////////////////////////////////////

function initMenu() {
    //Movimento e criação dos traços do menu
    const btnMenu = document.querySelector(".mobile_btn");
    const btnStripes = document.querySelectorAll(".mobile_btn span");
    //menu nav mobile
    const mobileNav = document.querySelector(".right__menu");

    btnMenu.addEventListener("click", () => {
        mobileNav.classList.toggle("active");
        btnStripes.forEach((e) => {
            e.classList.toggle("active");
        });
    });
}
function initHeaderFixer() {
    const header = document.querySelector(".headerbg");

    window.addEventListener("scroll", () => {
        const height = window.scrollY; 
        if (height > 135) {
            header.classList.add("fixed");
        } else{
            header.classList.remove("fixed");
        }
    });
}
function initModal() {
    const contactBtn = document.querySelector("#contact .cont-border");
    const modal = document.querySelector(".contat_grid_border");
    const modalCancelBtn = document.querySelector(".contat_grid .cancel");
    const menuItem = document.querySelector("nav .nav-item:nth-child(3)");

    function fecharAbrir() {
        modal.classList.toggle("active");
        modalCancelBtn.classList.remove("active");
    }

    window.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            modal.classList.remove("active");
        }
    });
    contactBtn.addEventListener("click", fecharAbrir);
    modalCancelBtn.addEventListener("click", fecharAbrir);
    menuItem.addEventListener("click", fecharAbrir);
}

////////////////////////////////////////
//             INICIADORES            //
////////////////////////////////////////
initModal();
initHeaderFixer();
initMenu();
