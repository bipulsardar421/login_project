let imgFile;
// in dom functionality manipulation

function nextStep(step) {
  const currentStep = document.querySelector(".step.active");
  const nextStep = document.querySelector(`.step[data-step="${step}"]`);
  currentStep.classList.remove("active");
  currentStep.classList.add("hidden");

  nextStep.classList.remove("hidden");
  nextStep.classList.add("active");
  const currentStepItem = document.querySelector(
    `.step-item[data-step="${step - 1}"]`
  );
  const nextStepItem = document.querySelector(
    `.step-item[data-step="${step}"]`
  );

  if (currentStepItem) {
    currentStepItem.classList.remove("active");
    currentStepItem.classList.add("complete");
  }
  if (nextStepItem) {
    nextStepItem.classList.add("active");
  }
}

function prevStep(step) {
  const currentStep = document.querySelector(".step.active");
  const prevStep = document.querySelector(`.step[data-step="${step}"]`);
  currentStep.classList.remove("active");
  currentStep.classList.add("hidden");
  prevStep.classList.remove("hidden");
  prevStep.classList.add("active");
  const currentStepItem = document.querySelector(
    `.step-item[data-step="${step + 1}"]`
  );
  const prevStepItem = document.querySelector(
    `.step-item[data-step="${step}"]`
  );
  if (currentStepItem) {
    currentStepItem.classList.remove("active");
  }
  if (prevStepItem) {
    prevStepItem.classList.remove("complete");
    prevStepItem.classList.add("active");
  }
}

// out dom functionality

var dropdownItems = document.querySelectorAll("#multiStepForm .dropdown-item");

dropdownItems.forEach(function (item) {
  item.addEventListener("click", function (event) {
    console.log("clicked");
    event.preventDefault();
    var value = this.dataset.value;
    var inputGroup = this.closest(".input-group");
    var dropdownToggle = inputGroup.querySelector(".dropdown-toggle");
    var hiddenInput = inputGroup.querySelector('input[type="hidden"]');

    dropdownToggle.textContent = value;
    hiddenInput.value = value;
    if (!hiddenInput.name) {
      console.error("Hidden input does not have a 'name' attribute.");
    }
  });
});
// profile pic
const uploadBox = document.getElementById("uploadBox");
const fileInput = document.getElementById("fileInput");
const browseBtn = document.getElementById("browseBtn");
browseBtn.addEventListener("click", (event) => {
  event.preventDefault();
  fileInput.click();
});
fileInput.addEventListener("change", handleFileSelect);
uploadBox.addEventListener("dragover", (event) => {
  event.preventDefault();
  uploadBox.classList.add("drop-active");
});

uploadBox.addEventListener("dragleave", () => {
  uploadBox.classList.remove("drop-active");
});

uploadBox.addEventListener("drop", (event) => {
  event.preventDefault();
  uploadBox.classList.remove("drop-active");
  if (event.dataTransfer.files.length) {
    handleFileSelect({ target: { files: event.dataTransfer.files } });
  }
});

function handleFileSelect(event) {
  const file = event.target.files[0];
  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();
    reader.onload = function (e) {
      const previewImage = document.createElement("img");
      previewImage.src = e.target.result;
      previewImage.classList.add("preview");
      previewImage.style.width = "100px";
      previewImage.style.height = "100px";
      previewImage.style.objectFit = "cover";

      const removeButton = document.createElement("button");
      removeButton.textContent = "Remove";
      removeButton.classList.add("remove-btn");
      removeButton.addEventListener("click", () => {
        resetUploadBox();
      });
      uploadBox.innerHTML = "";
      uploadBox.appendChild(previewImage);
      uploadBox.appendChild(removeButton);
    };
    reader.readAsDataURL(file);
  }
}

function resetUploadBox() {
  imgFile = "";
  uploadBox.innerHTML = `
        <div class="upload-icon">
            <img src="assets/icons/upload.svg" alt="Upload Icon">
        </div>
        <p>Drop your image here, or <a href="#" id="browseBtn">browse</a></p>
        <p>Supports: JPG, JPEG and PNG</p>
        <input type="file" id="fileInput" style="display: none;" accept="image/*">
    `;
  document.getElementById("browseBtn").addEventListener("click", (event) => {
    event.preventDefault();
    document.getElementById("fileInput").click();
  });
  document
    .getElementById("fileInput")
    .addEventListener("change", handleFileSelect);
}
$("#fileInput").on("change", function (e) {
  imgFile = e.target.files[0];
});
// handle addl information emp submit click

document
  .getElementById("multiStepForm")
  .addEventListener("submit", function (e) {
    e.preventDefault();
    var formData = {};
    $("#multiStepForm")
      .find("input, select, textarea")
      .each(function () {
        var inputName = $(this).attr("name");
        var inputValue = $(this).val();

        formData[inputName] = inputValue;
      });
    $.ajax({
      url: "./db-connection/add-additional-information.php",
      type: "POST",
      data: JSON.stringify(formData),
      contentType: "application/json",
      success: function (response) {
        console.log("Data successfully sent:", response);
        var ImgformData = new FormData();
        ImgformData.append("image", imgFile);
        ImgformData.append("user_id", $("#user_id_additional").val());
        $.ajax({
          url: "./db-connection/emp-image-db-model.php",
          type: "POST",
          data: ImgformData,
          contentType: false,
          processData: false,
          cache: false,
          dataType: "json",
          success: function (response) {
            if (response.status === "success") {
              alertFunction(response.message, "success");
              refreshTheSession();
              $("#employeeModal").modal("hide");
              $("#multiStepForm")[0].reset();
              $("#employees-summary-nav").addClass("show active");
            } else {
              alert(response.message);
            }
          },
          error: function (xhr, status, error) {
            alert("An error occurred while uploading the image.");
          },
        });
      },
      error: function (xhr, status, error) {
        console.error("Error sending data:", error);
      },
    });
  });
