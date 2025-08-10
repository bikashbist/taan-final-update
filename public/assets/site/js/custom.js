const acc_btns = document.querySelectorAll(".accordion-header");
const acc_btns_1 = document.querySelectorAll("i");
const acc_contents = document.querySelectorAll(".accordion-body");

acc_btns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    acc_contents.forEach((acc) => {
      if (
        e.target.nextElementSibling !== acc &&
        acc.classList.contains("active")
      ) {
        acc.classList.remove("active");
        acc_btns.forEach((btn) => btn.classList.remove("active"));
      }
    });

    const panel = btn.nextElementSibling;
    panel.classList.toggle("active");
    btn.classList.toggle("active");
  });
});
acc_btns_1.forEach((btni) => {
  btni.addEventListener("click", (e) => {
    acc_contents.forEach((acc) => {
      if (
        e.target.nextElementSibling !== acc &&
        acc.classList.contains("active")
      ) {
        acc.classList.remove("active");
        acc_btns.forEach((btni) => btni.classList.remove("active"));
      }
    });

    const panel = btni.nextElementSibling;
    panel.classList.toggle("active");
    btni.classList.toggle("active");
  });
});

window.onclick = (e) => {
  if (!e.target.matches(".accordion-header")) {
    acc_btns.forEach((btn) => btn.classList.remove("active"));
    acc_btns_1.forEach((btni) => btni.classList.remove("active"));
    acc_contents.forEach((acc) => acc.classList.remove("active"));
  }
};

// Show Modal
const openModalButton = document.getElementById("open-modal");
const modalWindowOverlay = document.getElementById("modal-overlay");
const modalWindow = document.getElementById("modal");
const modalWindowBody = document.getElementById("blur");

const showModalWindow = () => {
  modalWindowOverlay.style.display = 'flex';
  modalWindow.style.display = 'block'
  modalWindowBody.classList= "active";
}
openModalButton.addEventListener("click", showModalWindow);

// Hide Modal
const closeModalButton = document.getElementById("close-modal");

const hideModalWindow = () => {
    modalWindowOverlay.style.display = 'none';
    modalWindow.style.display = 'none'
    modalWindowBody.classList.remove= "active";
}

closeModalButton.addEventListener("click", hideModalWindow);


// Hide On Blur

const hideModalWindowOnBlur = (e) => {

    if(e.target === e.currentTarget) {
      console.log(e.target === e.currentTarget)
        hideModalWindow();
    }
}

modalWindowOverlay.addEventListener("click", hideModalWindowOnBlur)
