function alertFunction(message, type) {
  const alertPlaceholder = document.getElementById("status");
  const wrapper = document.createElement("div");
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible fade show" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    "</div>",
  ].join("");
  alertPlaceholder.append(wrapper);
  setTimeout(() => {
    wrapper.remove();
  }, 5000);
}

function showToast(message, type) {
  const shakeAnimationCSS = `
    @keyframes shake {
      0% { transform: translate(1px, 1px) rotate(0deg); }
      10% { transform: translate(-1px, -2px) rotate(-1deg); }
      20% { transform: translate(-3px, 0px) rotate(1deg); }
      30% { transform: translate(3px, 2px) rotate(0deg); }
      40% { transform: translate(1px, -1px) rotate(1deg); }
      50% { transform: translate(-1px, 2px) rotate(-1deg); }
      60% { transform: translate(-3px, 1px) rotate(0deg); }
      70% { transform: translate(3px, 1px) rotate(-1deg); }
      80% { transform: translate(-1px, -1px) rotate(1deg); }
      90% { transform: translate(1px, 2px) rotate(0deg); }
      100% { transform: translate(1px, -2px) rotate(-1deg); }
    }
    
    .shake-animation {
      animation: shake 0.5s;
      animation-iteration-count: 1;
    }
  `;
  const styleElement = document.createElement("style");
  styleElement.type = "text/css";
  styleElement.appendChild(document.createTextNode(shakeAnimationCSS));
  document.head.appendChild(styleElement);
  const toastContainer = document.createElement("div");
  toastContainer.className = `toast align-items-center position-fixed top-0 start-50 translate-middle-x text-bg-${type} border-0 mt-3 shake-animation`;
  toastContainer.setAttribute("role", "alert");
  toastContainer.setAttribute("aria-live", "assertive");
  toastContainer.setAttribute("aria-atomic", "true");
  toastContainer.style.zIndex = "1055";
  const toastInner = document.createElement("div");
  toastInner.className = "d-flex";
  const toastBody = document.createElement("div");
  toastBody.className = "toast-body";
  toastBody.textContent = message;
  const toastButton = document.createElement("button");
  toastButton.type = "button";
  toastButton.className = "btn-close me-2 m-auto";
  toastButton.setAttribute("data-bs-dismiss", "toast");
  toastButton.setAttribute("aria-label", "Close");
  toastInner.appendChild(toastBody);
  toastInner.appendChild(toastButton);
  toastContainer.appendChild(toastInner);
  document.body.appendChild(toastContainer);
  var toast = new bootstrap.Toast(toastContainer);
  toast.show();
  toastContainer.addEventListener("hidden.bs.toast", function () {
    toastContainer.remove();
  });
}

function notificationBagde(where, what, whereWhere) {
  const badge = document.createElement("span");
  if (whereWhere) {
    badge.className =
      "badge bg-danger rounded-circle d-flex justify-content-center align-items-center";
    badge.style.width = "20px";
    badge.style.height = "20px";
    badge.style.marginLeft = "8px";
  } else {
    badge.className =
      "badge bg-danger rounded-circle position-absolute top-100 start-100 translate-middle d-flex justify-content-center align-items-center";
    badge.style.width = "20px";
    badge.style.height = "20px";
  }
  const badgeNumber = document.createElement("span");
  badgeNumber.className = "ms-n1";
  badgeNumber.textContent = what;
  badge.appendChild(badgeNumber);
  const targetElement = document.getElementById(where);
  if (targetElement) {
    targetElement.appendChild(badge);
  } else {
    console.error(`Element with ID "${where}" not found.`);
  }
}
