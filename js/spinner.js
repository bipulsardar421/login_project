function toggleSpinner(action) {
  const content = document.querySelector(".content");
  let spinnerOverlay = document.getElementById("spinnerOverlay");

  if (action === "start") {
    if (!spinnerOverlay) {
      spinnerOverlay = document.createElement("div");
      spinnerOverlay.id = "spinnerOverlay";
      spinnerOverlay.classList.add("spinner-overlay");
      spinnerOverlay.innerHTML = `
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        `;
      document.body.appendChild(spinnerOverlay);
      const style = document.createElement("style");
      style.textContent = `
          .spinner-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(1, 1, 1, 0.8);
            z-index: 1070;
          }
          .blurred {
            filter: blur(5px);
          }
        `;
      document.head.appendChild(style);
    }

    spinnerOverlay.style.display = "flex";
    if (content) {
      content.classList.add("blurred");
    }
  } else if (action === "stop") {
    if (spinnerOverlay) {
      spinnerOverlay.style.display = "none";
      if (content) {
        content.classList.remove("blurred");
      }
    }
  }
}
