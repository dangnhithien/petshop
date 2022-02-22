const icon = document.querySelector(".logged .icon");
const sub = document.querySelector(".logged .submenu");

if (icon) {
    icon.addEventListener("click", () => {
        sub.classList.toggle("d-flex");
    });
}
function createPopup(tensp) {
    return `<div class="notification-wrapper ">    
    <div class="popup animtion">
            <div class="d-flex">
                <i class="fas fa-check-circle"></i>
                <div class='notification-text'>Thêm thành công
                    </div>
            </div>
        </div></div>`;
}
